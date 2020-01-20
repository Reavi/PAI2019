<?php
require_once 'controller/Controller.php';
require_once 'repository/UserRepository.php';


class BoardController extends Controller {
    public function main(){
        $this->checkSession();
        $usr=$this->getuserObj();
        $this->render('board', [
            'user' => $usr,
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
        return $ur->getUser($_SESSION['id']);
    }

}