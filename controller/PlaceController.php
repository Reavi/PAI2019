<?php
require_once 'controller/Controller.php';



class PlaceController extends Controller {
    public function index(){
        $this->checkSession();
        $this->render('index');
    }
}