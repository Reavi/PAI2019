<?php

require_once 'controller/allController.php';


class Routing
{
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
            'errorBoard' => [
                'controller' => 'BoardController',
                'action' => 'error'
            ],
            'getPlaceInCity' => [
                'controller' => 'BoardController',
                'action' => 'getPlaceInCity'
            ],
            'getPlace' => [
                'controller' => 'BoardController',
                'action' => 'getPlace'
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

            //MANEGER
            'manager' => [
                'controller' => 'ManagerController',
                'action' => 'index'
            ],
            'addnewplace' => [
                'controller' => 'ManagerController',
                'action' => 'addNewAccount'
            ],
            'sendmailplace' => [
                'controller' => 'ManagerController',
                'action' => 'sendmailplace'
            ],

            //PLACE
            'place' => [
                'controller' => 'PlaceController',
                'action' => 'index'
            ],
            'registerPlace' => [
                'controller' => 'PlaceController',
                'action' => 'register'
            ],
            'loginPlace' => [
                'controller' => 'PlaceController',
                'action' => 'login'
            ],
            'activatePlace' => [
                'controller' => 'PlaceController',
                'action' => 'activateAccount'
            ],
            'errorPlace' => [
                'controller' => 'PlaceController',
                'action' => 'error'
            ],


            //Menu
            'menu' => [
                'controller' => 'PlaceController',
                'action' => 'menu'
            ],
            'addNewMenu' => [
                'controller' => 'PlaceController',
                'action' => 'addNewMenu'
            ],
            'showMenu' => [
                'controller' => 'PlaceController',
                'action' => 'showMenu'
            ],
            'addPositionMenu' => [
                'controller' => 'PlaceController',
                'action' => 'addPositionMenu'
            ],
            'getPositionMenu' => [
                'controller' => 'PlaceController',
                'action' => 'getPositionMenu'
            ],
            'deleteMenu' => [
                'controller' => 'PlaceController',
                'action' => 'deleteMenu'
            ],
            'deletePosition' => [
                'controller' => 'PlaceController',
                'action' => 'deletePosition'
            ],

            //ERROR
            'errorSend' => [
                'controller' => 'ErrorController',
                'action' => 'errorSend'
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