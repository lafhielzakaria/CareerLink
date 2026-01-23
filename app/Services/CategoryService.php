<?php
namespace App\Services;
use App\Models\Entity\Category;
use App\Models\Repositories\CategoryRepository;
class CategoryService{
    public static function createCategory($title)
    {
        $categoryRepository = new CategoryRepository();

        $category = new Category($title);

        $category->setTitle($title);

        try {
            $category = $categoryRepository->addCategory($category);
        } catch (throwable $error) {
            $_SESSION['form_errors'][] = 'Error creating category';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

    }
}