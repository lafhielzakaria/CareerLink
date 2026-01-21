<?php


namespace App\Controllers;

use App\Services\AuthService;

/* 4at kon 3andna methode dyal register ol login*/

class AuthController
{
    private $AuthService;
    public function __construct()
    {
        $this->AuthService = new AuthService();
    }
    public function getRegister()
    {

        require_once './app/resources/views/register.php';
    }
    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $succes = $this->AuthService->register($firstName, $lastName, $email, $password);
            if ($succes) {
                echo 'register correct';
            } else {
                echo 'invalide register';
            }
        }
    }
}
