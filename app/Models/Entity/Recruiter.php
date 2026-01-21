<?php
namespace app\Models\Entity;

class Recruiter extends User {
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $password;
    protected $roleId;
    public function __construct (){
    
    }
}