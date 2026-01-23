<?php


namespace App\Config;

use Dotenv\Dotenv;

use PDO;

class Database
{
    private static $conn = null;
    private function construct() {}
    private function  clone() {}
    public static function getConnection()
    {

        if (self::$conn === null) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
            $dotenv->load();
            $dbhost = $_ENV["host"];
            $dbUser = $_ENV["userName"];
            $dbpass = $_ENV["password"];
            $dbName = $_ENV["dbName"];
            self::$conn = new PDO(
                "mysql:host=$dbhost;dbname=$dbName",
                $dbUser,
                $dbpass
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
}
Database::getConnection();