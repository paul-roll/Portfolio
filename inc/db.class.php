<?php

class db
{
    public static function conn()
    {
        $servername = "localhost";
        $dbname = "paulroll_portfolio";
        $username = "paulroll_portfolio";
        $password = ".Jb{]12P75%m";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "DB Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }
}
