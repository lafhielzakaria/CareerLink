<?php
namespace app\Models\Entity;

class JobOffre {
    private $id;
    private $recruiterId;
    private $title;
    private $description;
    private $status;
    
    public function __construct($id,$recruiterId, $title, $description, $status = 'actif') {
        $this->recruiterId = $recruiterId;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
    }
    
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    
    public function getRecruiterId() { return $this->id; }
    public function setUserId($userId) { $this->id = $userId; }
    
    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }
    
    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }
    
    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }
}