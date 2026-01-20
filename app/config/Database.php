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
            $dbhost = "localhost";
            $dbname = "singleton";
            $dbuser = "root";
            $dbpass = "";
            self::$conn = new PDO(
                "mysql:host=$dbhost;dbname=$dbname",
                $dbuser,
                $dbpass
            );
        }
        return self::$conn;
    }
}
