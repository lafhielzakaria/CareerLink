<?php
namespace App\Models\Entity;

use app\Models\Entity\User;

class Recruiter extends User
{
    private $companyName;


    public function __construct($nom, $email, $password, $role, $companyName)
    {
        return parent::__construct($nom, $email, $password, $role);
        $this->companyName = $companyName;
    }
}
