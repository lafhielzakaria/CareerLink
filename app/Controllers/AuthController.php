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

            $succes = $this->AuthService->register($firstName, $lastName, $email, $password, $role, $skills, $salary_expectation, $company_name);

            if ($succes) {

                header('Location:formLogin');
                exit;
            }
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $this->AuthService->login($email, $password);
            var_dump($role);
            if ($role === 'admin') {
                return header('Location:dsAdmin');
            } else if ($role === 'Candidate') {
                return header('Location:dsCandidate');
            } else if ($role === 'Recruiter') {
                return header('Location:dsRecruteur');
            }
        }
    }
}
