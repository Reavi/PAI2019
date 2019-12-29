<?php
require_once 'controller/Controller.php';
require_once 'Database.php';
require_once 'repository/UserRepository.php';
require_once 'models/User.php';
require_once 'config/emailTemplateConst.php';


class IndexController extends Controller {
    public function hello(){
        $this->render('index');
    }
    public function register()
    {
        $userRepository = new UserRepository();
        //jezeli formularz zostal wyslany
        if($this->isPost()){

            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $userRepository->getUser($email);

            if ($user) {
                //jezeli istnieje

                $this->render('register', ['messages' => ['Użytkownik z tym emailem już istnieje!']]);
                return;
            }

            $db=new Database();
            $con = $db->connect();

            $res=$con->prepare("SELECT * FROM kelner.usersTmp WHERE email='$email'");
            $res->execute();
            $res=$res->fetchAll(PDO::FETCH_ASSOC);


            if($res[0]["email"]){

                $key=$res[0]["key"];
                $login = $res[0]["email"];
                $name=$res[0]["name"];
            }else{
                $datenow=date('Y-m-d H:i:s');
                $surname=$_POST['surname'];
                $name=$_POST['name'];
                $login=$_POST['email'];
                $date=$_POST['birthdate'];
                $key=md5(mt_rand());
                $res=$con->prepare("INSERT INTO kelner.usersTmp  VALUES (NULL,'$name','$surname','$login', '$password','$date', '$key', '$datenow');");
                $res->execute();
                $key=md5(mt_rand());
                $login = $_POST['email'];
                $name=$_POST['name'];
            }
            $emailTemplate="models/email_template.php";
            $message=file_get_contents($emailTemplate);
            $message=str_replace("[url]","http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'],$message);
            $message=str_replace("[login]",$name,$message);
            $message=str_replace("[key]",$key,$message);
            mail($login ,SUBJECT ,$message , HEADERS);
            $this->render('register', ['messages' => ['Wysłano Email aktywacyjny']]);
            return;




        }
        $this->render('register');
    }

    public function statute()
    {
        $this->render('statute');
    }
    public function activate() {

        $key=$_GET['key'];
        $db=new Database();
        $con = $db->connect();

        $res=$con->prepare("SELECT * FROM kelner.usersTmp WHERE usersTmp.key='$key'");
        $res->execute();
        $res=$res->fetchAll(PDO::FETCH_ASSOC);

        if($res[0]["email"]){
            $permission=0;
            $name=$res[0]["name"];
            $surname=$res[0]["surname"];
            $email=$res[0]["email"];
            $password=$res[0]["password"];
            $id=$res[0]["id"];
            $res2=$con->prepare("INSERT INTO kelner.users  VALUES (NULL,'$name','$surname', '$email', '$password','$permission');");
            $res2->execute();
            $res=$con->prepare("DELETE FROM kelner.usersTmp WHERE usersTmp.id='$id'");
            $res->execute();

        }else{

        }
        $this->render('addcard');
    }

}