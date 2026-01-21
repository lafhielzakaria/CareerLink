<?php
namespace app\Controller;
/* 4at kon 3andna methode dyal register ol login*/  

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location:  ../public/index.php');
    exit;
}
