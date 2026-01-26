<?php
require_once __DIR__ . '/vendor/autoload.php';
// var_dump("hello");
// exit;
use app\core\Router;





$request = $_SERVER['REQUEST_URI'];
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$url = str_replace($script_name, '', $request);
$url = parse_url($url, PHP_URL_PATH);
$url = trim($url, '/');

$router = new Router();
$router->add('formRegister', ['AuthController', 'getRegister']);
$router->add('register', ['AuthController', 'register']);
$router->add('', ['AuthController', 'getLogin']);
$router->add('formLogin', ['AuthController', 'getLogin']);
$router->add('login', ['AuthController', 'login']);
$router->add('dsAdmin', ['AuthController', 'dsAdmin']);
$router->add('dsRecruteur', ['AuthController', 'dsRecruteur']);
$router->add('dsCandidate', ['AuthController', 'dsCandidate']);
$router->add('logout', ['AuthController', 'logout']);
$router->add('apply', ['AuthController', 'applyCommande']);
$router->add('joboffreController', ['JoboffreController', 'create']);

$router->dispatch($url);
