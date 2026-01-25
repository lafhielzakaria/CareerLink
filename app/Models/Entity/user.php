<?php
namespace app\Models\Entity;

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $role;
    
    public function __construct($firstName, $lastName, $email, $password, $role, $id = null)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getRole()
    {
        return $this->role;
    }
}