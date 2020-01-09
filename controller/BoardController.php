<?php
require_once 'controller/Controller.php';



class BoardController extends Controller {
    public function main(){
        $this->render('board');
    }
}