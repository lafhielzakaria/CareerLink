<?php
namespace App\Models\Entity;
use App\Models\Entity\User;
class Recruiter extends User
{
    private $id;
    private $nom;
    private $email;
    private $password;
    private $companyName;
    private $role;
    public function __construct($name, $email, $password, $role, $companyName)
    {
     $this->name = $name;
     $this->email = $email;
     $this->password = $password;
     $this->role = $role;
    }
    static function getId (){
        return $this->id;
    }
}
