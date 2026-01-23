<?php
use App\Models\Repositories\CategoryRepository;
use App\Services\CategoryService;
class InputController
{

    public function categoryInput()
    {
        session_start();

        $form_errors = [];

        if (empty($_POST['title'])) {
            $form_errors[] = 'All fields are required!';
        }

        if (empty($form_errors)) {

            try {
                CategoryService::createCategory(
                    trim(string: $_POST['title']),
                );
                header('Location: ../Views/log-in.php');
                exit;
            } catch (Throwable $e) {
                $form_errors[] = 'Category already exist';
            }
        }


        $_SESSION['form_errors'] = $form_errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

}