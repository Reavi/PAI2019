<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
require_once 'Routing.php';

$router = new Routing();
$router->run();

?>