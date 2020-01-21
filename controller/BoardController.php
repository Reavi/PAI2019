<?php
require_once 'controller/Controller.php';
require_once 'repository/UserRepository.php';


class BoardController extends Controller {
    public function main(){
        $this->checkSession();
        $usr=$this->getuserObj();
        $placeRepository = new PlaceRepository();
        $city=$placeRepository->getCityAll();
        $this->render('board', [
            'user' => $usr,
            'title'=>'Znajdź Lokal',
            'selection'=>'main',
            'places'=>$city
        ]);
    }
    public function getPlaceInCity(){
        $pr=new PlaceRepository();
        $res=$pr->getPlaceInCity($_GET['city']);
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($res);
    }
    public function error()
    {
        $this->checkSession();
        $this->render('error',[
            'title'=>'Zgłoś problem',
            'user'=>$this->getUserObj(),
        ]);
    }

    private function getuserObj(){
        $ur = new UserRepository();
        return $ur->getUser($_SESSION['id']);
    }

}