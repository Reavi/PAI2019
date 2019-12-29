<?php

require_once 'controller/IndexController.php';
require_once 'controller/LoginController.php';

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
                'controller' => 'LoginController',
                'action' => 'login'
            ],
            'statute' => [
                'controller' => 'IndexController',
                'action' => 'statute'
            ],
            'activate' => [
                'controller' => 'IndexController',
                'action' => 'activate'
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