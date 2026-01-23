<?php

namespace App\Models\Entity;

class Role
{
    private $nameRole;
    public function __construct($nameRole)
    {
        $this->nameRole = $nameRole;
    }
    public function getNameRole()
    {
        return $this->nameRole;
    }
}
