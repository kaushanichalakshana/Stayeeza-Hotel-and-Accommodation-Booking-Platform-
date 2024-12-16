<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;

/**
 * Description of Booking
 *
 * @author dilha
 */
require 'DBConnecter_3.php';
use Classes\DBConnecter_3;
use PDO;
use PDOException;
class Booking {
    //put your code here
    
    function __construct() {
        
    }
    public function viewUser($id){
        
        $query = "SELECT * FROM user WHERE userId=?";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $id);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

    public function cancelBooking($bookingId){
        $query = "DELETE FROM booking WHERE bookingId =?";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $bookingId);
            $pstmt->execute();
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function cancelPayment($bookingId){
        $query = "DELETE FROM payment WHERE bookingId =?";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $bookingId);
            $pstmt->execute();
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function deletePayment(){

        $query = "DELETE payment,booking FROM payment INNER JOIN booking ON payment.bookingId = booking.bookingId WHERE status=?";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, "Incomplete");
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
}

