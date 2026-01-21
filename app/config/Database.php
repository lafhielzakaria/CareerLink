<?php
namespace App\Config;
class Database
{
    private static $conn = null;
    private function __construct(){}
    private function  __clone(){}
    public static function getConnection()
    {
        if (self::$conn === null) {
            $dbhost = $_ENV["host"];
            $dbname = $_ENV["userName"];
            $dbpass = $_ENV["password"];
            $dbName = $_ENV["host"];
            self::$conn = new PDO(
                "mysql:host=$dbhost;dbname=$dbname",
                $dbuser,
                $dbpass
            );
        }
        return self::$conn;
    }
}
