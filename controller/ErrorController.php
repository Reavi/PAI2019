<?php
require_once 'controller/Controller.php';
require_once 'repository/ErrorRepository.php';

class ErrorController extends Controller
{
    public function errorSend()
    {
        if($this->isPost()){
            $er=new ErrorRepository();
            $er->addError($_POST['email'],$_POST['text']);
        }
        $this->mainPage();
    }


}