<?php

namespace app\Models\Entity;

use App\Models\Entity\Role;

class User
{

    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $role;
    public function __construct($firstName, $lastName, $email, $password, $role)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    public function getfirstName()
    {
        return $this->firstName;
    }
    public function getlastName()
    {
        return $this->lastName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function getRole()
    {
        return $this->role;
    }
}
