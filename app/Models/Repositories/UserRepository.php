<?php

namespace app\Models\Repositories;

use App\config\Database;

class UserRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function emailExists($email)
    {

        $stmt = $this->conn->prepare("select * from users where email=?");
        $stmt->execute([':email' => $email]);
        return $stmt->rowCount() > 0;
    }
}
