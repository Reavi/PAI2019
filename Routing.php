<?php

require_once 'controller/allController.php';


class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'register' => [
                'controller' => 'IndexController',
                'action' => 'register'
            ],
            'index' => [
                'controller' => 'IndexController',
                'action' => 'hello'
            ],
            'login' => [
                'controller' => 'IndexController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'IndexController',
                'action' => 'logout'
            ],
            'statute' => [
                'controller' => 'IndexController',
                'action' => 'statute'
            ],
            'activate' => [
                'controller' => 'IndexController',
                'action' => 'activate'
            ],
            'addcard' => [
                'controller' => 'IndexController',
                'action' => 'addcard'
            ],

            //BOARD
            'board' => [
                'controller' => 'BoardController',
                'action' => 'main'
            ],
            //ADMIN
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'index'
            ],
            'users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],

            //MENEGER
            'manager' => [
                'controller' => 'ManagerController',
                'action' => 'index'
            ],
            'place' => [
                'controller' => 'PlaceController',
                'action' => 'index'
            ]


        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'index';
        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}