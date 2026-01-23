<?php
namespace App\Controllers;
session_start();
use app\Services\JobOffreService;
use app\Models\Entity\JobOffre;
use app\Models\Repositories\JobOffreRepository;
class JobOffreController {
    private $jobOffreService;
    private $repository;
    
    public function __construct() {
        $this->jobOffreService = new JobOffreService();
        $this->repository = new JobOffreRepository();
    }
    public function getAllSkills(){
       $skills =  $this->repository->getAllSkills();
       return $skills;
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['jobTitle'];
            $description = $_POST['offreDescription'];
            $userId = $_SESSION['user_id'] ?? null;
            
            if (!$userId) {
                exit();
            }
            $isValid = $this->jobOffreService->validateJobOffre($title, $description);
            if (!$isValid) {
                exit();
            }
            $jobOffre = new JobOffre(null, $userId, $title, $description);
            $this->repository->save($jobOffre);
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new JobOffreController();
    $controller->create();
}