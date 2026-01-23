<?php
namespace app\Controllers;
require_once '../../vendor/autoload.php';
session_start();
use App\Models\Entity\JobOffre;
use App\Models\Repositories\JobOfferRepository;
use App\Services\JobOffreService;
use App\Models\Entity\Recruiter;
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
            $Recruiter = new Recruiter ();
            $title = $_POST['jobTitle'];
            $description = $_POST['offreDescription'];
            $skills = $_POST['skills'] ?? [];
            $RecruiterId =  $_SESSION["RecruiterId"];
            $isValid = $this->jobOffreService->validateJobOffre($title, $description);
            if (!$isValid) {
                exit();
            }
            $jobOffre = new JobOffre($RecruiterId, $userId, $title, $description);
            $jobOffreId = $this->repository->save($jobOffre);
            
            if ($jobOffreId && !empty($skills)) {
                $this->repository->saveJobSkills($jobOffreId, $skills);
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump ($_POST["skills"]);
    $controller = new JobOffreController();
    $controller->create();
}