<?php
namespace App\Models\Entity;
class Category
{
    private $id;
    private $title;
    //array tags
    //add tag 
    public function __construct($title)
    {
        $this->title = $title;
    }
    
    public function getId(){return $this->id;}
    public function gettitle(){return $this->title;}
}