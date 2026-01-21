<?php
<<<<<<< HEAD
namespace app\Controllers;
/* 4at kon 3andna methode dyal register ol login*/
=======
namespace app\Controller;
/* 4at kon 3andna methode dyal register ol login*/  

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location:  ../public/index.php');
    exit;
}
>>>>>>> a5ad3d963409a581123a4f4119eed292dac01ce5
