<?php

namespace App\core;
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
            $obj = new $controller;
            $obj->$method();
        } else {
            http_response_code(404);
            echo "Page not found";
        }
    }
}
