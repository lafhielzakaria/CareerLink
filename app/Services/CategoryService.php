<?php
namespace App\Services;

use App\Models\Entity\Category;
use App\Models\Repositories\CategoryRepository;

class CategoryService {
    public static function createCategory($title)
    {
        echo $title;
        $categoryRepository = new CategoryRepository();
        $category = new Category($title);

        // try {
            $savedCategory = $categoryRepository->addCategory($category);

            return $savedCategory;
        // } catch (Throwable $error) {
        //     $_SESSION['form_errors'][] = 'Error creating category: ' . $error->getMessage();

        //     header('Location: ' . $_SERVER['HTTP_REFERER']);
        //     exit;
        // }
    }
}
