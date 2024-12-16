<?php

namespace classes;

use PDO;
use PDOException;

class DBConnecter2{
    private static $hostname = "localhost";
    private static $dbname = "stayeeza";
    private static $username = "root";
    private static $password = "";

    public static function getConnection(){
        try{
            $dsn = "mysql:host=".DBConnecter2::$hostname.";dbname=".DBConnecter2::$dbname;
            $con = new PDO($dsn, DBConnecter2::$username, DBConnecter2::$password);
            return $con;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}