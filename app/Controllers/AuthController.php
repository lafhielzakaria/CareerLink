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
    public function getlogin()
    {
        require_once './app/resources/views/login.php';
    }

   public function dsAdmin()
    {
        require_once './app/resources/views/dashbordAdmin.php';
    }
    public function dsCandidate()
    {
        require_once './app/resources/views/dashbordCandidat.php';
    }
    public function dsRecruteur()
    {
        require_once './app/resources/views/dashbordRecruteur.php';
    }
    public function logout()
    {
        session_start();

        session_unset();
        session_destroy();

        header('Location: formLogin');
        exit;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $role = $_POST['role_id'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $skills = $_POST['skills'];
            $salary_expectation = $_POST['salary_expectation'];
            $company_name = $_POST['company_name'];

            $success = $this->authService->register($firstName, $lastName, $email, $password, $role, $skills, $salary_expectation, $company_name);
            if ($success) {
                header('Location: formLogin');
                exit;
            }
        }
    }
    public function login()
   {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $this->authService->login($email, $password);
            var_dump($role);

            if ($role === 'admin') {
                return header('Location: dsAdmin');
            } else if ($role === 'Candidat') {
                return header('Location: dsCandidate');
            } else if ($role === 'Recruiter') {
                return header('Location: dsRecruteur');
            }
        }
    }
}
