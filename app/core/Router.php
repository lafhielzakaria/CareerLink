<?php

namespace App\core;
use App\Controllers\AuthController;

class Router
{
    private $routes = [];

    public function add($path, $callback)
    {
        $this->routes[$path] = $callback;
    }

    public function dispatch($url)
    {

        if (array_key_exists($url, $this->routes)) {
            $action = $this->routes[$url];
            
            $controller = $action[0];
            $method = $action[1];
            
            $user=new AuthController();
          /*   $className = "App\Controllers\\".$controller;
            $obj = new $className();
            var_dump("hello");

            var_dump($obj);
            $obj->$method(); */
        } else {
            http_response_code(404);
            echo "Page not found";
        }
    }
}
