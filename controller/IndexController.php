<?php
require_once 'Controller.php';
class IndexController extends Controller {
    public function hello(){

        $this->render('index');
    }
}