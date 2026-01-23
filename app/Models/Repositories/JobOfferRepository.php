<?php
namespace app\Models\Repositories;
use App\Config\Database;
class JobOfferRepository{
    private $conn;
    public function __construct(){
        $this->conn = Database::getConnection();
    }
    public function save($jobOffre){
        try {
            $sql = "INSERT INTO job_offre (user_id, title, description, status) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $jobOffre->getId(),
                $jobOffre->getTitle(),
                $jobOffre->getDescription(),
                $jobOffre->getStatus()
            ]);
        } catch (Exception $e) {
            return false;
        }
    }
    public function saveJobSkills($jobOffreId, $skills) {
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