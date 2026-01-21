<?php
require_once __DIR__ . '/../../vendor/autoload.php';

class Database
{
    private static $conn = null;
    private function __construct(){}
    private function  __clone(){}
    public static function getConnection()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();
        if (self::$conn === null) {
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
Database::getConnection();
Database::getConnection();