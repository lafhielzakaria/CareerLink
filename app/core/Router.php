<?php

namespace App\core;




class Router
{

  private $routes = [];

  public function add($path, $callBack)
  {
    $this->routes[$path] = $callBack;
  }

  public function dispatch($url)
  {
    if (array_key_exists($url, $this->routes)) {
      $action = $this->routes[$url];

      $controller = $action[0];
      $method = $action[1];
      $className = "App\Controllers\\" . $controller;

      $obj = new $className();
      $obj->$method();
    } else {
      http_response_code(404);
      echo "this file not found";
    }
  }
}
