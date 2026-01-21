<?php

namespace App\Models\Entity;

use app\Models\Entity\User;

class Candidate extends User
{
    private $companyName;




    public function __construct($nom, $email, $password, $role, $companyName)
    {
        return parent::__construct($nom, $email, $password, $role);
        $this->role = $role;
    }
}
