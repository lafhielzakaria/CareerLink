<?php
namespace App\Controllers;
session_start();
use app\Models\Entity\JobOffre;
use app\Models\Repositories\JobOfferRepository;
use app\Services\JobOffreService;
class JobOffreController {
    private $jobOffreService;
    private $repository;
    public function __construct() {
        $this->jobOffreService = new JobOffreService();
        $this->repository = new JobOfferRepository();
    }
    public function getAllSkills(){
       $skills =  $this->repository->getAllSkills($RecruiterId);
       return $skills;
    }
    public function getAllJoboffers (){
       $RecruiterId =  $_SESSION['user_id'];
       $jobOffres =  $this->repository->getAllJoboffers($RecruiterId);
       return $jobOffres;
    }
    public function logout (){
        session_destroy();
        header('Location: formLogin');
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset ($_POST['jobTitle'])) {
         if (session_status() === PHP_SESSION_NONE) {
           session_start();   
           }    
            $id = Null;
            $title = $_POST['jobTitle'] ?? '';
            $description = $_POST['offreDescription'] ?? '';
            $skills = (array) ($_POST['skills'] ?? []);
            $RecruiterId = $_SESSION['user_id'];
            $jobOffre = new JobOffre($id, $RecruiterId, $title, $description, 'actif');
            $isValid = $this->jobOffreService->validateJobOffre($title, $description);
            if (!$isValid) {
                exit();
            }
            $jobOffreId = $this->repository->save($jobOffre);            
            if ($jobOffreId && !empty($skills)) {
                $this->repository->saveJobSkills($jobOffreId, $skills, $RecruiterId);
            }
            header('Location: dsRecruteur');
            exit();
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset ($_POST['jobTitle'])) {
    $controller = new JobOffreController();
    $controller->create();
}
else if (isset ($_POST["logout"]) && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller = new JobOffreController();
    $controller->logout ();
}