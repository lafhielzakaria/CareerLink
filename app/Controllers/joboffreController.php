<?php
namespace App\Controllers;
session_start();
use App\Models\Entity\JobOffre;
use App\Models\Repositories\JobOfferRepository;
use App\Services\JobOffreService;
class JobOffreController {
    private $jobOffreService;
    private $repository;
    public function __construct() {
        $this->jobOffreService = new JobOffreService();
        $this->repository = new JobOfferRepository();
    }
    public function getAllSkills(){
       $skills =  $this->repository->getAllSkills();
       return $skills;
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (session_status() === PHP_SESSION_NONE) {
           session_start();   
           }    
            $id = Null;
            $title = $_POST['jobTitle'];
            $description = $_POST['offreDescription'];
            $skills = $_POST['skills'] ?? [];
            $RecruiterId = $_SESSION['user_id'];
            $jobOffre = new JobOffre($id,$RecruiterId,$title, $description, 'actif');
            $isValid = $this->jobOffreService->validateJobOffre($title, $description);
            if (!$isValid) {
                exit();
            }
            $jobOffreId = $this->repository->save($jobOffre);            
            if (!empty($skills)) {
                $this->repository->saveJobSkills($jobOffreId, $skills, $RecruiterId);
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump ($_POST["skills"]);
    $controller = new JobOffreController();
    $controller->create();
     header('Location:dsRecruteur');
}