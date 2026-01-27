<?php
namespace App\Controllers;

use App\Services\AuthService;

class AuthController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function category()
    {
        require_once './app/resources/views/formCategory.php';
    }
    public function categorySearch()
    {
        require_once './app/resources/views/categorySearch.php';
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
