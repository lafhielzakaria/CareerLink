<?php
namespace App\Models\Entity;
class Category
{
    private $title;
    public function __construct($title)
    {
        $this->title = $title;
    }
    public function getCategory(){}
}