<?php
namespace app\Models\Repositories;
require_once __DIR__ . '/../../config/Database.php';

class UserRepository {
    private $db;
    
    public function __construct() {
        $this->db = \Database::getConnection();
    }
}