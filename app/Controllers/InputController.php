<?php
namespace App\Controllers;

use App\Services\CategoryService;

class InputController
{
    public function inputHandel()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if (isset($_POST['AddCategory'])) {
            $this->categoryAddInput();
        }

        if (isset($_POST['EditCategory'])) {
            $this->categoryEditInput();
        }
    }

    public function categoryAddInput()
    {
        $form_errors = [];
        $title = trim($_POST['title'] ?? '');

        if ($title === '') {
            $form_errors[] = 'Title is required';
        }

        if (empty($form_errors)) {
            $category = CategoryService::createCategory($title);

            if ($category) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

            $form_errors[] = 'Category could not be created';
        }

        $_SESSION['form_errors'] = $form_errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function categoryEditInput()
    {
        $form_errors = [];

        $id = $_POST['id'] ?? null;
        $title = trim($_POST['title'] ?? '');

        if (!$id || $title === '') {
            $form_errors[] = 'ID and title are required';
        }

        if (empty($form_errors)) {
            $category = CategoryService::editCategory($id, $title);

            if ($category) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

            $form_errors[] = 'Category could not be updated';
        }

        $_SESSION['form_errors'] = $form_errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function searchCategory()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['error' => 'Invalid request']);
            exit;
        }

        $title = trim($_POST['title'] ?? '');

        if ($title === '') {
            echo json_encode(['error' => 'Title is required']);
            exit;
        }

        $category = CategoryService::getCategoryByTitle($title);

        if (!$category) {
            echo json_encode(['error' => 'Category not found']);
            exit;
        }

        echo json_encode($category);
        exit;
    }


}
