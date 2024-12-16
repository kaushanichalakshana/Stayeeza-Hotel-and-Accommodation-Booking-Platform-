<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;
use PDO;
use PDOException;
/**
 * Description of DBConnecter
 *
 * @author dilha
 */
class DBConnecter {
    private $host="localhost";
    private $dbname="stayeeza";
    private $dbuser="root";
    private $dbpass="";
    
    public function getConnection(){
        try{
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
        $con = new PDO($dsn, $this->dbuser, $this->dbpass);
        return $con;
        }
        catch(PDOException $ex){
            echo "Connection Faild".$ex->getMessage();
        }
        
        }
    //put your code here
}
