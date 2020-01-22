<?php
require_once 'controller/Controller.php';
require_once 'repository/UserRepository.php';


class BoardController extends Controller {
    public function main(){
        $this->checkSession();
        $usr=$this->getuserObj();
        $placeRepository = new PlaceRepository();
        $city=$placeRepository->getCityAll();
        $userRep = new UserRepository();
        $places= $userRep->getUserLocalWithName($usr->getId());
        $this->render('board', [
            'user' => $usr,
            'title'=>'Znajdź Lokal',
            'selection'=>'main',
            'places'=>$city,
            'lokale'=>$places
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
    public function getPlace(){
        $idplace=$_GET['id'];
        $placeRepository=new PlaceRepository();
        $place = $placeRepository->getPlaceForId($idplace);
        $tables = $placeRepository->getTable($idplace);
        $ad=$place->getAddress();
        $result=[
            'place'=>[
                'id'=>$place->getId(),
                'name'=>$place->getName(),
                'miasto' => $ad->getMiasto(),
                'ulica' => $ad->getUlica(),
                'kodpocztowy' => $ad->getKodPocztowy(),
                'blok' => $ad->getBlok(),
                'mieszkanie' =>$ad->getMieszkanie()
            ],
            'tables'=>$tables];
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($result);

    }
    private function getuserObj(){
        $ur = new UserRepository();
        return $ur->getUser($_SESSION['id']);
    }

}