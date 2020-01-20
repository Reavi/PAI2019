<?php
require_once 'controller/Controller.php';
require_once 'repository/AddressRepository.php';
require_once 'repository/PlaceRepository.php';


class PlaceController extends Controller
{
    public function index(Place $place = null)
    {
        $this->checkPlaceSession();
        if ($place == null) {
            $pr = new PlaceRepository();
            $place = $pr->getPlaceForId($_SESSION['idPlace']);
        }
        $this->render('index', ['title' => 'Wybierz co chcesz zrobić', 'user' => $place]);
    }

    public function activateAccount()
    {
        if (!isset($_GET['key']) || !isset($_GET['id']) || !isset($_GET['email'])) {
            header('Location: index.php');
            return;
        }
        $this->render('register');
    }

    public function login()
    {
        if ($this->isPost()) {
            if ($_POST['email'] == "" || $_POST['password'] == "") {
                $this->render('login', ['messages' => ['Uzupełnij wszystkie pola']]);
                return;
            }
            $placeRepository = new PlaceRepository();
            $place = $placeRepository->getPlace($_POST['email']);
            if ($place == null) {
                $this->render('login', ['messages' => ['Zły adres email']]);
                return;
            }
            if ($place->getPassword() != $_POST['password']) {
                $this->render('login', ['messages' => ['Złe hasło']]);
                return;
            }
            $_SESSION['idPlace'] = $place->getId();
            $this->render('index', ['title' => 'Wybierz co chcesz zrobić', 'place' => $place]);

        }

        $this->render('login');

    }

    public function register()
    {

        if ($this->isPost()) {
            $email = $_POST['email'];
            $id = $_POST['id'];
            $name = $_POST['name'];
            if ($_POST['password'] == "" ||
                $_POST['namePlace'] == "" ||
                $_POST['passwordAgain'] == "" ||
                $_POST['miasto'] == "" ||
                $_POST['ulica'] == "" ||
                $_POST['kod'] == "" ||
                $_POST['numerbloku'] == "" ||
                $_POST['numermieszkania'] == "") {
                $this->render('register', [
                    'messages' => ['Uzupełnij wszystkie pola'],
                    'email' => $email,
                    'id' => $id,
                    'name' => $name
                ]);
                return;
            }
            if ($_POST['password'] != $_POST['passwordAgain']) {
                $this->render('register', [
                    'messages' => ['Hasla sie nie zgadzają'],
                    'email' => $email,
                    'id' => $id,
                    'name' => $name
                ]);
                return;
            }

            $namePlace = $_POST['namePlace'];
            $miasto = $_POST['miasto'];
            $ulica = $_POST['ulica'];
            $kodpocztowy = $_POST['kod'];
            $numerBloku = $_POST['numerbloku'];
            $numerMieszkania = $_POST['numermieszkania'];
            $password = $_POST['password'];

            $adresRepository = new AddressRepository();
            $adresRepository->addAddress($miasto, $ulica, $kodpocztowy, $numerBloku, $numerMieszkania);
            $idAdres = $adresRepository->getAddress($miasto, $ulica, $kodpocztowy, $numerBloku, $numerMieszkania);
            $placeRepository = new PlaceRepository();
            if (!$placeRepository->addPlaces($namePlace, $email, $password, $id, $idAdres->getId())) {
                $this->render('register', [
                    'messages' => ['Coś poszło nie tak! Przepraszamy. Prosimy o kontakt z naszym przedstawicielem'],
                    'email' => $email,
                    'id' => $id,
                    'name' => $name
                ]);
            } else {
                $places = $placeRepository->getPlace($email);
                $_SESSION['idPlace'] = $places->getId();
                $this->index($places);
            }


        }
        $this->index();
    }

    private function checkPlaceSession()
    {
        if (!isset($_SESSION['idPlace'])) {
            $url = "http://$_SERVER[HTTP_HOST]/kelner/?page=loginPlace";
            header("Location: {$url}");
            return;
        }
    }

    public function error()
    {
        $this->checkPlaceSession();
        $this->render('error',[
            'title'=>'Zgłoś problem',
            'user'=>$this->getPlaceObject(),
        ]);
    }

    private function getPlaceObject(): Place {
        $placeRepository = new PlaceRepository();
        return $placeRepository->getPlaceForId($_SESSION['idPlace']);
    }

}