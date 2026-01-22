<?php

namespace App\Models\Repositories;

use App\config\Database;

class RecruiterRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function create($user_id, $company_name)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO recruiters (user_id,company_name) VALUES (:user_id,:company_name)"
        );
        $stmt->execute([
            'user_id' => $user_id,
            'company_name' => $company_name
        ]);
        return true;
    }
}
