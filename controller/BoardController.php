<?php
require_once 'controller/Controller.php';
require_once 'repository/UserRepository.php';


class BoardController extends Controller {
    public function main(){
        $this->checkSession();

        $this->render('board', [
            'user' => $this->getuserObj(),
            'title'=>'Znajdź Lokal',
            'selection'=>'main',
            'places'=>['Kraków','Warszawa']
        ]);
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
        return $ur->getUserForId($_SESSION['idPlace']);
    }

}