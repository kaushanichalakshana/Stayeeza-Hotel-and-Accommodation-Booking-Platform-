<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;

/**
 * Description of Paayment
 *
 * @author dilha
 */

require 'DBConnecter_2.php';
use Classes\DBConnecter2;
use PDO;
use PDOException;
class Paayment {
    private $bookingid;
    private $userid;
    private $hotelid;
    private $numofnights;
    private $bookingdate;
    private $bookingprice;
    
    private $roomId;
    private $roomType;
    
    function __construct($bookingid, $userid, $hotelid, $numofnights, $bookingdate, $bookingprice,$roomId,$roomType) {
        $this->bookingid = $bookingid;
        $this->userid = $userid;
        $this->hotelid = $hotelid;
        $this->numofnights = $numofnights;
        $this->bookingdate = $bookingdate;
        $this->bookingprice = $bookingprice;
        $this->roomId = $roomId;
        $this->roomType = $roomType;
    }
    public function registerPayment(){
        $query = "INSERT INTO booking(bookingId,hotelId,userId,roomId,numOfNights,bookingDate,bookingPrice,roomType) VALUES(?,?,?,?,?,?,?,?)";
        $dbcon = new DBConnecter2();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->bookingid);
            $pstmt->bindValue(2, $this->hotelid);
            $pstmt->bindValue(3, $this->userid);
            $pstmt->bindValue(4, $this->roomId);
            $pstmt->bindValue(5, $this->numofnights);
            $pstmt->bindValue(6, $this->bookingdate);
            $pstmt->bindValue(7, $this->bookingprice);
            $pstmt->bindValue(8, $this->roomType);
            $pstmt->execute();
            
            if($pstmt->rowCount()>0){
                header("Location:../web-pages/Confirm.php");
            }
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    
    public function loadBooking($bookingId){
        $query = "SELECT * FROM booking WHERE bookingId=?";
        $dbcon = new DBConnecter2();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $bookingId);
            
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $rs;
            
            
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
public function viewHotel($id){
        
        $query = "SELECT * FROM hotels WHERE hotel_id=?";
        $dbcon = new DBConnecter2();
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
    
    
    
 public function payment($orderid,$bookingid,$userid,$hotelcharge,$paymentdate,$hotelname,$roomType,$status){
        $query = "INSERT INTO payment(invoiceNo,bookingId,userId,hotelCharges,paymentDate,hotelname,roomType,status) VALUES(?,?,?,?,?,?,?,?)";
        $dbcon = new DBConnecter2();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $orderid);
            $pstmt->bindValue(2, $bookingid);
            $pstmt->bindValue(3, $userid);
            $pstmt->bindValue(4, $hotelcharge);
            $pstmt->bindValue(5, $paymentdate);
            $pstmt->bindValue(6, $hotelname);
            $pstmt->bindValue(7, $roomType);
            $pstmt->bindValue(8, $status);
            $pstmt->execute();
            
            
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

public function paymentView($id){
        
        $query = "SELECT * FROM payment WHERE userId=?";
        $dbcon = new DBConnecter2();
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
    public function UpdateStatus($status,$bookingId){
        
        $query = "UPDATE payment SET status = ? WHERE bookingId=?";
        $dbcon = new DBConnecter2();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
           $pstmt->bindValue(1, $status);
           $pstmt->bindValue(2, $bookingId);
            $pstmt->execute();
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

    public function hotelView($id){
        
        $query = "SELECT * FROM hotels WHERE ownerid=?";
        $dbcon = new DBConnecter2();
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
    
//     public function sendMail($email,$hotelName,$order_id){
       
//     //put your code here
}
