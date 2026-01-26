<?php
namespace App\resources\templates\Twig;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
class Twig {
    public static function render ($view , $data){
      $loader = new FilesystemLoader ("../views");
      $twig = new Environment ($loader);
      echo $twig->render($view , $data);
      }
}