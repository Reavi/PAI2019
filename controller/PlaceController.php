<?php
require_once 'controller/Controller.php';
require_once 'repository/AddressRepository.php';
require_once 'repository/PlaceRepository.php';


class PlaceController extends Controller
{
    public function index()
    {
        $this->checkSession();
        $this->render('index',['title' => 'Wybierz co chcesz zrobić']);
    }

    public function activateAccount()
    {
        if (!isset($_GET['key']) || !isset($_GET['id']) || !isset($_GET['email'])) {
            header('Location: index.php');
            return;
        }
        $this->render('register');
    }
    public function register(){
        if($this->isPost()){
            $email = $_POST['email'];
            $id=$_POST['id'];
            $name=$_POST['name'];
            if($_POST['password']=="" || $_POST['namePlace']=="" || $_POST['passwordAgain']==""){
                $this->render('register',[
                    'messages'=> ['Uzupełnij wszystkie pola'],
                    'email'=>$email,
                    'id' =>$id,
                    'name' =>$name
                ]);
                return;
            }
            if($_POST['password'] != $_POST['passwordAgain']){
                $this->render('register',[
                    'messages'=> ['Hasla sie nie zgadzają'],
                    'email'=>$email,
                    'id' =>$id,
                    'name' =>$name
                ]);
                return;
            }

            $namePlace=$_POST['namePlace'];
            $miasto=$_POST['miasto'];
            $ulica=$_POST['ulica'];
            $kodpocztowy=$_POST['kod'];
            $numerBloku=$_POST['numerbloku'];
            $numerMieszkania=$_POST['numermieszkania'];
            $password=$_POST['password'];
            /*
           echo $namePlace."\n".$email."\n".$id."\n".$password;
           */
            //All is good :D
            $adresRepository = new AddressRepository();
            $adresRepository->addAddress($miasto,$ulica,$kodpocztowy,$numerBloku,$numerMieszkania);
            $idAdres=$adresRepository->getAddress($miasto,$ulica,$kodpocztowy,$numerBloku,$numerMieszkania);
            $placeRepository = new PlaceRepository();
            $placeRepository->addPlaces($namePlace,$email,$password,$id,$idAdres->getId());
            $place=$placeRepository->getPlaces($email);
            var_dump($place);
            die("working?!");
        }
    }
}