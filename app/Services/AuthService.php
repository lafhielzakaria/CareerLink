<?php

namespace App\Services;

use app\Models\Entity\User;
use App\Models\Repositories\UserRepository;

class AuthService
{
    private $userRepo;
    public function __construct()
    {
        $this->userRepo = new UserRepository;
    }
    public function register($firstName, $lastName, $email, $password)
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
        $user = new User($firstName, $lastName, $email, $hashedPassword);
    }
}
