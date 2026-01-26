<?php

namespace app\Models\Repositories;

use App\config\Database;
use App\Models\Entity\User;
use PDO;

class UserRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function emailExists($email)
    {
        $stmt = $this->conn->prepare("select * from users where email=:email");
        $stmt->execute([
            'email' => $email
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }
        return $this->mapToUser($user);
    }
    public function create(User $user)
    {
        $stmt = $this->conn->prepare("insert into users (first_name,last_name,email,password,role_id) values
        (:firstName,:lastName,:email,:password,:role)");
        $stmt->execute([
            'firstName' => $user->getfirstName(),
            'lastName' => $user->getlastName(),
            'email' => $user->getEmail(),
            'password' => $user->getpassword(),
            'role' => $user->getRole()
        ]);
        $user = $this->conn->lastInsertId();
        return $user;
    }
    public function getRole(User $user)
    {

        $stmt = $this->conn->prepare("
            select R.name
            from roles R
            inner join users U
            on R.id=U.role_id
            where U.email=:email
        ");
        $stmt->execute([
            'email' => $user->getEmail()
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return  $row['name'];
        }
    }
    public function mapToUser($user)
    {
        //$id = $user['id'];

        $objectUser = new User(
            $user['id'],
            $user['first_name'],
            $user['last_name'],
            $user['email'],
            $user['password'],
            $user['role_id']
        );
        return $objectUser;
    }
    public function applyCommande($userId, $jobId)
    {
        $stmt = $this->conn->prepare("INSERT INTO condidate_apply (user_id, job_offre_id) VALUES (:user_id, :job_id)");
        $stmt->execute([
            'user_id' => $userId,
            'job_id' => $jobId
        ]);
        return true;
    }
}
