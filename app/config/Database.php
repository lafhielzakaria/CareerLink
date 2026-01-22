<?php
<<<<<<< HEAD

namespace App\Config;

=======
<<<<<<< HEAD:app/config/database.php
require_once __DIR__ . '/../../vendor/autoload.php';

=======
namespace App\Config;
>>>>>>> a5ad3d963409a581123a4f4119eed292dac01ce5:app/config/Database.php
>>>>>>> login_feature
class Database
{
    private static $conn = null;
    private function __construct() {}
    private function  __clone() {}
    public static function getConnection()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();
        if (self::$conn === null) {
            $dbhost = $_ENV["host"];
<<<<<<< HEAD
            $dbname = $_ENV["userName"];
            $host = $_ENV["host"];
            $dbpass = $_ENV["password"];
            self::$conn = new PDO(
                "mysql:host=$dbhost;dbname=$dbname",
                $host,
=======
            $dbUser = $_ENV["userName"];
            $dbpass = $_ENV["password"];
            $dbName = $_ENV["dbName"];
            self::$conn = new PDO(
                "mysql:host=$dbhost;dbname=$dbName",
                $dbUser,
>>>>>>> login_feature
                $dbpass
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        return self::$conn;
    }
}
Database::getConnection();
Database::getConnection();
Database::getConnection();