<?php
<<<<<<< HEAD

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
$router->add('login', ['AuthController', 'login']);

$router->dispatch($url);
=======
require_once "../vendor/autoload.php";
use app\core\Router;
$uri = $_SERVER['REQUEST_URI'] ?? ''; 
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$url = str_replace($script_name, '', $uri);
$url = parse_url($url, PHP_URL_PATH);
$url = trim($url, '/');
$router = new Router ();
$router->add ('',['PageController','login']);
$router->add ('login',['PageController','login']);
$router->add ('signup',['PageController','signup']);
$router->dispatch($url);
>>>>>>> login_feature
