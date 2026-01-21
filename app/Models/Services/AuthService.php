<?php
class AuthService{


    public static function redirect(string $role)
    {
        if ($role === 'admin') {
            return header('Location: ../Views/admin-dashboard.php');
        } else if ($role === 'user') {
            return header('Location: ../Views/user-dashboard.php');
        } else if ($role === 'company') {
            return header('Location: ../Views/company-dashboard.php');
        }
        
    }

}