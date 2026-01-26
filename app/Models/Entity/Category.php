<?php
namespace App\Models\Entity;
class Category
{
    private $id;
    private $title;
    private $tags;
    public function addTag()
    {

    }
    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setId($id)
    {
        $this->id = $id;
    }


}