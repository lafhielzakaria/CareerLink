<?php
require_once "../vendor/autoload.php";
use app\Models\Entity\Router;
$request = $_SERVER['REQUEST_URI']; 
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$url = str_replace($script_name, '', $request);

$url = parse_url($url, PHP_URL_PATH);

$url = trim($url, '/');
$router = new Router ();
$router->add ('',['page','login']);
$router->add ('login',['page','login']);
$router->add ('signup',['page','signup']);
$router->add ('category',['InputController','categoryInput']);
$router->redirect($url);
var_dump ($uri);
$router->redirect($url);
