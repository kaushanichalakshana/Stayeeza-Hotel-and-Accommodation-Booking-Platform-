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
 * Description of Admin
 *
 * @author dilha
 */
class Admin {
    private $id;

    //put your code here

    public function loadUsers() {
        $query = "SELECT * FROM user";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    
    public function loadOwners() {
        $query = "SELECT * FROM hotelowner";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->execute();
                    
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    
    public function viewUser($id){
        $this->id=$id;
        $query = "SELECT * FROM user WHERE userId=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->id);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    
    public function viewHOwner($id){
        $this->id=$id;
        $query = "SELECT * FROM hotelowner WHERE ownerId=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->id);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    
    public function deleteHOwner($id){
        $this->id=$id;
        $query = "DELETE FROM hotelowner WHERE ownerId=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->id);
            $pstmt->execute();

        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    
    public function deleteuser($id){
        $this->id=$id;
        $query = "DELETE FROM user WHERE userId=?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->id);
            $pstmt->execute();

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
    
    public function paymentView(){

        $query = "SELECT invoiceNo,hotelId,payment.bookingId,payment.userId,hotelCharges,paymentDate,bookingDate,hotelName,payment.roomType,status FROM payment INNER JOIN booking ON payment.bookingId = booking.bookingId;";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);

            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

}
