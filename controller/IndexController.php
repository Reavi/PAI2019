<?php
require_once 'Controller.php';
class IndexController extends Controller {
    public function hello(){
        $this->render('index');
    }
    public function register()
    {
        $this->render('register');
    }public function statute()
    {
        $this->render('statute');
    }
}