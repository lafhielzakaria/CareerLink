<?php
require_once "../vendor/autoload.php";
use app\Models\core\Router;
$uri = $_SERVER['REQUEST_URI'] ?? ''; 
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$url = str_replace($script_name, '', $request);
$url = parse_url($url, PHP_URL_PATH);
$url = trim($url, '/');
$router = new Router ();
$router->add ('',['PageController','login']);
$router->add ('login',['PageController','login']);
$router->add ('signup',['PageController','signup']);
$router->redirect($url);