<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;
require 'DBConnecter.php';
use Classes\DBConnecter;
use PDO;
use PDOException;
/**
 * Description of login
 *
 * @author dilha
 */
class login {
    //put your code here
    public function checkUser($email){
        $query = "SELECT * FROM user WHERE userEmail=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();
            
            return $pstmt->rowCount();

        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function verifyUser($email){
        $query = "SELECT * FROM user WHERE userEmail=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            return $result->userPassword;;

        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function loadUser($email) {
        $query = "SELECT * FROM user WHERE userEmail=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

    
    
    
    
    
    
    
    public function checkAdmin($email){
        $query = "SELECT * FROM admin WHERE adminEmail=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();
            
            return $pstmt->rowCount();

        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function verifyAdmin($email){
        $query = "SELECT * FROM admin WHERE adminEmail=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            return $result->adminPassword;;

        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function loadAdmin($email) {
        $query = "SELECT * FROM admin WHERE adminEmail=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    
    
    
    
    
    
    public function checkOwner($email){
        $query = "SELECT * FROM hotelowner WHERE ownerEmail=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();
            
            return $pstmt->rowCount();

        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function verifyOwner($email){
        $query = "SELECT * FROM hotelowner WHERE ownerEmail=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            return $result->ownerPassword;;

        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function loadOwner($email) {
        $query = "SELECT * FROM hotelowner WHERE ownerEmail=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    
    public function resetPassworduser($pass,$id) {
        $query = "UPDATE user SET userPassword=? WHERE userId=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $pass);
            $pstmt->bindValue(2, $id);
            $pstmt->execute();
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function resetPasswordOwner($pass,$id) {
        $query = "UPDATE hotelowner SET ownerPassword=? WHERE ownerId=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $pass);
            $pstmt->bindValue(2, $id);
            $pstmt->execute();
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
}
