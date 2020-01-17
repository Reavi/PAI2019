<?php
require_once 'controller/Controller.php';



class ManagerController extends Controller {
    public function index(){
        $this->checkSession();
        $this->render('index');
    }
}