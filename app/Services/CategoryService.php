<?php
namespace App\Services;

use App\Models\Entity\Category;
use App\Models\Repositories\CategoryRepository;

class CategoryService
{
    public static function createCategory($title)
    {
        echo $title;
        $categoryRepository = new CategoryRepository();
        $category = new Category($title);

        try {
            $savedCategory = $categoryRepository->addCategory($category);

            return $savedCategory;
        } catch (\Throwable $error) {
            $_SESSION['form_errors'][] = 'Error creating category: ' . $error->getMessage();

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    public static function editCategory($id, $title)
    {
        $categoryRepository = new CategoryRepository();

        $category = new Category($title);
        $category->setId($id);

        return $categoryRepository->updateCategory($category);
    }

    public static function deleteCategory($id)
    {
        $categoryRepository = new CategoryRepository();
        return $categoryRepository->deleteCategory($id);
    }

    public static function getCategoryByTitle($title)
    {
        $repo = new CategoryRepository();
        return $repo->findByTitle($title);
    }




}
