<?php
require_once 'controller/Controller.php';
require_once 'repository/AddressRepository.php';
require_once 'repository/PlaceRepository.php';
require_once 'repository/MenuRepository.php';


class PlaceController extends Controller
{
    public function index()
    {
        $this->checkSession();
        if (!isset($_GET['id'])) {
            $this->mainPage();
        }
        $idPlace = $_GET['id'];

        $pr = new PlaceRepository();
        $place = $pr->getPlaceForId($idPlace);
        $_SESSION['idPlace'] = $idPlace;
        $this->render('index', ['title' => 'Wybierz co chcesz zrobić', 'user' => $place]);
    }

    public function error()
    {
        $this->checkSession();
        $this->render('error', [
            'title' => 'Zgłoś problem',
            'user' => $this->getPlaceObject(),
        ]);
    }

    public function menu()
    {
        $this->prepare();

        $mr = new MenuRepository();
        $res = $mr->getMenu($_SESSION['idPlace']);
        $this->render('menu', [
            'title' => 'Menu lokalu',
            'user' => $this->getPlaceObject(),
            'menu' => $res
        ]);
    }

    public function addNewMenu()
    {
        if ($this->isPost()) {
            $mr = new MenuRepository();
            $res = $mr->getMenu($_SESSION['idPlace']);
            if ($_POST['name'] == "") {
                $this->render('menu', [
                    'title' => 'Menu lokalu',
                    'user' => $this->getPlaceObject(),
                    'menu' => $res,
                    'messages' => ['Nazwa nie może być pusta!']
                ]);
            }
            $mr->addMenu($_POST['name'], $_SESSION['idPlace']);
            $this->menu();
        }

        $this->index();
    }

    public function addPositionMenu()
    {
        $this->checkSession();


        $name = $_GET['name'];
        $price = $_GET['price'];


        $description = $_GET['description'];
        $mr = new PositionMenuRepository();
        $idmenu = $_GET['idmenu'];
        $mr->addPosition($name, $price, $description, $idmenu);
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode("working");
    }

    public function getPositionMenu()
    {
        $this->checkSession();
        header('Content-type: application/json');
        http_response_code(200);
        $pr = new PositionMenuRepository();
        $positions = $pr->getAllPosition($_GET['id']);
        echo json_encode($positions);
    }

    private function getPlaceObject(): Place
    {
        $placeRepository = new PlaceRepository();
        return $placeRepository->getPlaceForId($_SESSION['idPlace']);
    }

    private function prepare()
    {
        $this->checkSession();
        if (!isset($_SESSION['idPlace'])) {
            $this->index();
            return;
        }
    }

    public function deleteMenu(){
        try{
            $menuRepo=new MenuRepository();
            if($menuRepo->deleteMenu($_POST['id'])){
                echo "working";
            }
            else {
                echo "not workig";
            }
        }catch (PDOException $PDOException){
            echo "Menu nie jest puste!";
        }

    }
    public function deletePosition(){
        try{
            $menuRepos=new PositionMenuRepository();
            if($menuRepos->deletePosition($_POST['id'])){
                echo "working";
            }
            else {
                echo "not workig";
            }
        }catch (PDOException $PDOException){
            echo "Menu nie jest puste!";
        }

    }

}