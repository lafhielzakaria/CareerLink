<?php
namespace App\Models\Repositories;
use App\Config\Database;
use App\Models\Entity\Category;
class CategoryRepository
{

    private $conn;


    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function addCategory($title)
    {
        try{
            $category = new Category($title);
            $query = 'INSERT INTO category(title) VALUES(:title)';
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ":title" => $title
            ]);
        }
        catch (err){
            echo err;
        }


    }
}