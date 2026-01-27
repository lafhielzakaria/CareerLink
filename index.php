<?php
require_once __DIR__ . '/vendor/autoload.php';
// var_dump("hello");
// exit;
use App\core\Router;
use App\Controllers\AuthController;
use App\Controllers\InputController;

$request = $_SERVER['REQUEST_URI'] ?? '';
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$url = str_replace($script_name, '', $request);
$url = parse_url($url, PHP_URL_PATH);
$url = trim($url, '/');

$router = new Router();
$router->add('formRegister', [AuthController::class, 'getRegister']);
$router->add('register', [AuthController::class, 'register']);
$router->add('Category', [AuthController::class, 'category']);
$router->add('categorySearch', [AuthController::class, 'categorySearch']);

$router->add('category/add', [InputController::class, 'inputHandel']);
$router->add('category/edit', [InputController::class, 'inputHandel']);
$router->add('category/search', [InputController::class, 'searchCategory']);

//$router->add('', ['AuthController', 'login']);
$router->add('formLogin', [AuthController::class, 'getLogin']);
$router->add('login', [AuthController::class, 'login']);

$router->add('dsAdmin', [AuthController::class, 'dsAdmin']);
$router->add('dsRecruteur', [AuthController::class, 'dsRecruteur']);
$router->add('dsCandidate', [AuthController::class, 'dsCandidate']);
$router->dispatch($url);
