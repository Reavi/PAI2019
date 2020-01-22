<?php
require_once 'controller/Controller.php';
require_once 'Database.php';
require_once 'repository/UserRepository.php';
require_once 'models/User.php';
require_once 'config/emailTemplateConst.php';
require_once 'config/role.php';
require_once 'repository/CardRepository.php';

class IndexController extends Controller
{
    public function hello()
    {
        $this->render('index');
    }

    public function register()
    {
        $userRepository = new UserRepository();
        //jezeli formularz zostal wyslany
        if ($this->isPost()) {
            if(!isset($_POST['email'])){
                $this->render('register', ['messages' => ['Nie wpisales emailu!']]);
                return;
            }
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $userRepository->getUser($email);

            if ($user) {
                $this->render('register', ['messages' => ['Użytkownik z tym emailem już istnieje!']]);
                return;
            }

            $db = new Database();
            $con = $db->connect();

            $res = $con->prepare("SELECT * FROM kelner.usersTmp WHERE email='$email'");
            $res->execute();
            $res = $res->fetchAll(PDO::FETCH_ASSOC);


            if (!empty($res[0]["email"])) {

                $key = $res[0]["key"];
                $login = $res[0]["email"];
                $name = $res[0]["name"];
            } else {
                $datenow = date('Y-m-d H:i:s');
                $surname = $_POST['surname'];
                $name = $_POST['name'];
                $login = $_POST['email'];
                $date = $_POST['birthdate'];
                $key = md5(mt_rand());
                $res = $con->prepare("INSERT INTO kelner.usersTmp  VALUES (NULL,'$name','$surname','$login', '$password','$date', '$key', '$datenow');");
                $res->execute();
                $login = $_POST['email'];
                $name = $_POST['name'];
            }
            $emailTemplate = "mail/email_template.php";
            $message = file_get_contents($emailTemplate);
            $message = str_replace("[url]", "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], $message);
            $message = str_replace("[login]", $name, $message);
            $message = str_replace("[key]", $key, $message);
            mail($login, SUBJECT, $message, HEADERS);
            $this->render('register', ['messages' => ['Wysłano Email aktywacyjny']]);
            return;

        }
        $this->render('register');
    }

    public function statute()
    {
        $this->render('statute');
    }

    public function activate()
    {
        if (!isset($_GET['key'])) {
            $this->render('index', ['messages' => ['Brak klucza aktywacyjnego!']]);
            return;
        }
        $userRepo=new UserRepository();
        $key = $_GET['key'];
        $res=$userRepo->checkKey($key);
        if (empty($res)) {
            $this->render('index', ['messages' => ['Nie rozpoznano klucza aktywacyjnego!']]);
            return;
        }
        //znalazlo taki klucz i mamy dane
        $name = $res["name"];
        $surname = $res["surname"];
        $email = $res["email"];
        $password = $res["password"];
        $password = md5($password);
        $id = $res["id"];
        $userRepo->addNewUser($name,$surname,$email,$password,$id);
        $res = $this->setSession($email, $password);
        if ($res[0] == false) {
            $this->render('index', ['messages' => [$res[1]]]);
            return;
        }
        $_SESSION['card'] = true;
        $this->render('addcard');

    }

    public function addcard()
    {
        if (isset($_POST['nb']) and isset($_POST['data']) and isset($_POST['cvv']) and isset($_POST['name'])) {
            $cardRepository = new CardRepository();
            $userRepo= new UserRepository();
            $user=$userRepo->getUser($_SESSION['id']);
            $cardRepository->addCard($_POST['name'],$_POST['surname'],$_POST['cvv'],$_POST['data'],$user->getId());
            header("Location: ?page=board");
        } else {
            header("Location: ?page=activate");
        }
    }

    public function login()
    {


        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = md5($password);
            $res = $this->setSession($email, $password);

            if ($res[0] == false) {
                $this->render('index', ['messages' => [$res[1]]]);
                return;
            } else {
                $url = "http://$_SERVER[HTTP_HOST]/kelner/";
                header("Location: {$url}?page=board");
                return;
            }


        }

        $this->render('index');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->render('index', ['messages' => ['Pomyślnie się wylogowałeś']]);
    }


    private function setSession($email, $password)
    {
        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email);
        $permission = $userRepository->getUserPermission($user->getId());
        if (!$user) {
            return [false, "Użytkownik z tym emailem nie istnieje!"];
        }

        if ($user->getPassword() !== $password) {
            return [false, "Złe hasło"];
        }

        $_SESSION["id"] = $user->getEmail();
        $_SESSION["role"] = $permission;
        return [true, "Pomyślnie zalogowano"];
    }
}