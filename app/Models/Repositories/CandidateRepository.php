<?php

namespace App\Models\Repositories;

use App\config\Database;

class CandidateRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function create($user_id, $skills, $salary_expectation)
    {

        $stmt = $this->conn->prepare(
            "INSERT INTO candidates (user_id,skills,salary_expectation) VALUES (:user_id,:skills,:salary_expectation)"
        );
        //var_dump($user_id);
        $stmt->execute([
            'user_id' => $user_id,
            'skills' => $skills,
            'salary_expectation' => $salary_expectation
        ]);
        return true;
    }
}
