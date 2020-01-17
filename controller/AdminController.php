<?php
require_once 'controller/Controller.php';


class AdminController extends Controller {
    public function index(){
        $this->checkSession();
        $userRepository = new UserRepository();
        $this->render('index',['user' => $userRepository->getUser($_SESSION['id'])]);
    }
    public function users()
    {
        $this->checkSession();
        $userRepository = new UserRepository();
        header('Content-type: application/json');
        http_response_code(200);

        $users = $userRepository->getUsers();
        echo $users ? json_encode($users) : '';
    }
}