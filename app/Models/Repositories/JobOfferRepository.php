<?php
class JobOfferRepository{

    private $conn;

    public function __construct(){
        $this->conn = Database::getConnection();

    }

    public function softDeleteOffer($id){
        $query = "UPDATE job_offer SET deleted_at = CURRENT_TIMESTAMP WHERE id = (:id)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ":id" => $id
        ]);
    }
}