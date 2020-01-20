<?php
require_once 'controller/Controller.php';


class ManagerController extends Controller
{
    public function index()
    {
        $this->checkSession();
        $this->render('index');
    }

    public function addNewAccount()
    {
        $this->checkSession();
        $userRepository = new UserRepository();
        $users = $userRepository->getUsers();
        $this->render('addPlace', ['users' => $users]);
    }

    public function sendmailplace()
    {
        $this->checkSession();
        $userRepository = new UserRepository();
        $users = $userRepository->getUsers();
        if(!isset($_POST['email']) || !isset($_POST['email2']) || !isset($_POST['userSelect'])){
            $this->render('addPlace', ['users' => $users,'messages'=>['Uzupełnij wszystkie pola!']]);

        }else{
            if($_POST['email']!=$_POST['email2']){
                $this->render('addPlace', ['users' => $users,'messages'=>['Różne emaile!']]);
            }
            //check email
            $email=$_POST['email'];
            $idUser=$_POST['userSelect'][0];
            $db = new Database();
            $con = $db->connect();
            $res = $con->prepare("SELECT * FROM kelner.Lokal WHERE email='$email'");
            $res->execute();
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            if(empty($res[0]["email"])) {
                //all is good
                //send email
                $emailTemplate = "mail/placeTemplate.php";
                $message = file_get_contents($emailTemplate);
                $message = str_replace("[url]", "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], $message);
                $message = str_replace("[key]", "localplace", $message);
                $message = str_replace("[id]", $idUser, $message);
                mail($email, SUBJECTPLACE, $message, HEADERS);
            }else{
                //?
            }
            $this->render('addPlace', ['users' => $users,'messages'=>['Wysłano email aktywacyjny!']]);

        }
    }
}