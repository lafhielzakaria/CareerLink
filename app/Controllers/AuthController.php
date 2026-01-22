<?php
namespace app\Controllers;

use app\Services\AuthService;

class AuthController
{
    private $authService;
    
    public function __construct()
    {
        $this->authService = new AuthService();
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
            $success = $this->authService->register($firstName, $lastName, $email, $password);
            if ($success) {
                echo 'register correct';
            } else {
                echo 'invalid register';
            }
        }
    }
}
