<?php
namespace app\Models\Entity;
class Router {
  private $router = [];
  public function add ($path , $callback,$middleware){
  $router[$path] = $callback;
  }
  public function redirect ($uri){
    if (array_key_exists($url,$this->router)){
   $action = $this->router[$url];
   $controller = $action[0];
   $methode = $action[1];
   
   
   $className = "Controller\\".$controller;
   $obj = new $className ();
   $obj->$methode();
    }
    else {
      http_response_code (404);
      echo "cannot define file";
    }
  }
}