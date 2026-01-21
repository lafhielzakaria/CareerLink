<?php
namespace app\core;
class Router {
  private $routes = [];
  public function add ($path , $callback){
    $this->routes[$path] = $callback;
  }
  public function dispatch ($url){
    if (array_key_exists($url, $this->routes)){
      $action = $this->routes[$url];
      $controller = $action[0];
      $methode = $action[1];
      $className = "app\\Controllers\\".$controller;
      $obj = new $className ();
      $obj->$methode();
    }
    else {
      http_response_code (404);
      echo "Page not found";
    }
  }
}