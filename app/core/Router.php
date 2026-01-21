<?php
namespace app\core;
class Router {
  private $routes = [];
  public function add ($path , $callback){
    $this->routes[$path] = $callback;
  }
<<<<<<< HEAD
  public function dispatch ($url){
    if (array_key_exists($url, $this->routes)){
      $action = $this->routes[$url];
      $controller = $action[0];
      $methode = $action[1];
      $className = "app\\Controllers\\".$controller;
      $obj = new $className ();
      $obj->$methode();
=======
  public function redirect ($uri){
    if (array_key_exists($url,$this->router)){
   $action = $this->router[$url];
   $controller = $action[0];
   $methode = $action[1];
   
   
   $className = "Controller\\".$controller;
   $obj = new $className ();
   $obj->$methode();
>>>>>>> a5ad3d963409a581123a4f4119eed292dac01ce5
    }
    else {
      http_response_code (404);
      echo "Page not found";
    }
  }
}