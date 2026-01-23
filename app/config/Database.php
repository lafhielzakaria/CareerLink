<?php
<<<<<<< HEAD
namespace App\Config;
use Dotenv\Dotenv;
use PDO;
=======


namespace App\Config;

use Dotenv\Dotenv;

use PDO;

require_once __DIR__ . '/../../vendor/autoload.php';


>>>>>>> 94f0d19709aa2fd39a0e85dcb2bf116ed32d9d86
class Database
{
    private static $conn = null;
    private function construct() {}
    private function  clone() {}
    public static function getConnection()
    {
<<<<<<< HEAD
        if (self::$conn === null) {
            var_dump (__DIR__);
            $dotenv = Dotenv::createImmutable('../../');
            $dotenv->load();
            $dbhost = $_ENV["host"];
            $dbUser = $_ENV["userName"];
=======

        if (self::$conn === null) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
            $dotenv->load();
            $dbhost = $_ENV["host"];
            $dbUser = $_ENV["userName"];
            $dbname = $_ENV["userName"];
            $host = $_ENV["host"];
>>>>>>> 94f0d19709aa2fd39a0e85dcb2bf116ed32d9d86
            $dbpass = $_ENV["password"];
            $dbName = $_ENV["dbName"];
            self::$conn = new PDO(
                "mysql:host=$dbhost;dbname=$dbName",
                $dbUser,
<<<<<<< HEAD
                $dbpass
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
}
Database::getConnection();
=======
                $dbpass
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
                $dbpass
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

        return self::$conn;
    }
}
Database::getConnection();
>>>>>>> 94f0d19709aa2fd39a0e85dcb2bf116ed32d9d86
