<?php

namespace App\Config;

class Database
{
    private static $conn = null;
    private function __construct() {}
    private function  __clone() {}
    public static function getConnection()
    {
        if (self::$conn === null) {
            $dbhost = $_ENV["host"];
            $dbname = $_ENV["userName"];
            $host = $_ENV["host"];
            $dbpass = $_ENV["password"];
            self::$conn = new PDO(
                "mysql:host=$dbhost;dbname=$dbname",
                $host,
                $dbpass
            );
        }
        return self::$conn;
    }
}
