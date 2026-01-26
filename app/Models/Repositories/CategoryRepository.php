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

    public function addCategory($category)
    {
        try {
            $query = 'INSERT INTO category(title) VALUES(:title)';
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ":title" => $category->getTitle()
            ]);
        } catch (\Throwable $e) {
            echo "err";
        }
        return $category;

    }
    public function updateCategory(Category $category)
    {
        $query = 'UPDATE category SET title = :title WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $stmt->execute([
            ':title' => $category->getTitle(),
            ':id' => $category->getId()
        ]);

        return $category;
    }

    public function deleteCategory($id)
    {
        $query = 'DELETE FROM category WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
    public function findByTitle(string $title)
    {
        $query = 'SELECT id, title FROM category WHERE title = :title LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':title' => $title
        ]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }



}