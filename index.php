<?php

use App\core\Router;

require_once __DIR__ . '/vendor/autoload.php';




$request = $_SERVER['REQUEST_URI'];
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$url = str_replace($script_name, '', $request);
$url = parse_url($url, PHP_URL_PATH);
$url = trim($url, '/');

$router = new Router();
$router->add('formRegister', ['AuthController', 'getRegister']);
$router->add('register', ['AuthController', 'register']);
//$router->add('', ['AuthController', 'login']);
$router->add('formLogin', ['AuthController', 'getLogin']);
$router->add('login', ['AuthController', 'login']);
<<<<<<< HEAD
$router->add ('category',['InputController','categoryInput']);
=======

$router->add('dsAdmin', ['AuthController', 'dsAdmin']);
$router->add('dsRecruteur', ['AuthController', 'dsRecruteur']);
$router->add('dsCandidate', ['AuthController', 'dsCandidate']);

>>>>>>> 94f0d19709aa2fd39a0e85dcb2bf116ed32d9d86
$router->dispatch($url);
