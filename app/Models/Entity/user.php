<?php

namespace app\Models\Entity;

use App\Models\Entity\Role;

class User
{

    private $nom;
    private $email;
    private $password;
    private $role;
    public function __construct($nom, $email, $password, Role $role)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function setRole(Role $role)
    {
        $this->role = $role;
    }
}
