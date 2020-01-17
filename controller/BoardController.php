<?php
require_once 'controller/Controller.php';



class BoardController extends Controller {
    public function main(){
        $this->checkSession();
        $userRepository = new UserRepository();

        $this->render('board', ['user' => $userRepository->getUser($_SESSION['id']),
            'title'=>"Znajdź Lokal",
            'selection'=>'main',
            'places'=>['Kraków','Warszawa']
        ]);
    }
}