<?php

namespace app\Services;

use app\Models\Entity\User;
use app\Models\Repositories\CandidateRepository;
use app\Models\Repositories\RecruiterRepository;
use app\Models\Repositories\UserRepository;

class AuthService
{
    private $userRepo;
    private $recruiterRepo;
    private $candidateRepo;
    public function __construct()
    {
        $this->userRepo = new UserRepository;
        $this->recruiterRepo = new RecruiterRepository();
        $this->candidateRepo = new CandidateRepository();
    }
    public function register($firstName, $lastName, $email, $password, $role, $skills, $salary_expectation, $company_name)
    {

        if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
            return false;
        }

        if (strlen($password) < 6) {
            return false;
        }
        if ($this->userRepo->emailExists($email)) {
            return false;
        }
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User($firstName, $lastName, $email, $hashedPassword, $role);
        $user_id = $this->userRepo->create($user);
        //var_dump($user_id);


        if ($role == 1) {

            $this->candidateRepo->create($user_id, $skills, $salary_expectation);
        }

        if ($role == 2) {
            $this->recruiterRepo->create($user_id, $company_name);
        }

        return true;
    }
    public function login($email, $password)
    {
        if (empty($email) || empty($password)) {
            return false;
        }

        $user = $this->userRepo->emailExists($email);
        if (!$user) {
            return false;
        }


        if (!password_verify($password, $user->getPassword())) {
            return false;
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['role'] = $user->getRole();
        $role = $this->userRepo->getRole($user);

        return $role;
    }
}
