<?php
namespace App\Controllers;
session_start();
use App\Services\CategoryService;

class InputController
{
    public function inputHandel()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['AddCategory'])) {
                $this->categoryInput();
                require_once './app/resources/views/formCategory.php';

            }
            // if (isset($_POST['Addtag'])) {
            //     $this->tagInput();
            // }
        }
    }

    public function categoryInput()
    {
        
        
        $form_errors = [];
        
        $title = $_POST['title'] ?? '';
        
        if ($title === '') {
            $form_errors[] = 'All fields are required!';
        }
        
        if (empty($form_errors)) {
            $category = CategoryService::createCategory($title);
            
            if (!$category) {
                $form_errors[] = 'Category could not be created';
            } else {
                // header('Location: /Views/log-in.php');
                exit;
            }
        }
        
        $_SESSION['form_errors'] = $form_errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
