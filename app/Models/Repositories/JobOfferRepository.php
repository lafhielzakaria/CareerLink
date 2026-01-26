<?php
namespace app\Models\Repositories;
require_once __DIR__ . '/../../config/Database.php';
class JobOfferRepository{
    private $conn;
    public function __construct(){
        $this->conn = \Database::getConnection();
    }
    public function getAllJoboffers ($RecruiterId){
        $sql = "select * from job_offre where user_id = $RecruiterId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(); 
        return $stmt->fetchAll();
    }
    public function save($jobOffre){
        try {
            $sql = "INSERT INTO job_offre (user_id, title, description, status) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $jobOffre->getUserId(),
                $jobOffre->getTitle(),
                $jobOffre->getDescription(),
                $jobOffre->getStatus()
            ]);
            return $this->conn->lastInsertId();
    } catch (PDOException $e) {
        echo "failed to create offre".$e->getMessage();
    }
    }
    public function saveJobSkills($jobOffreId, $skills, $userId) {
        try {
            foreach ($skills as $skillId) {
                $sql = "INSERT INTO job_offre_recommended (job_offre_id, tag_id) VALUES (?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$jobOffreId, $skillId]);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function getAllSkills(){
        $query = "SELECT * FROM tags";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function softDeleteOffer($id){
        $query = "UPDATE job_offre SET status = 'archive' WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
    }
}