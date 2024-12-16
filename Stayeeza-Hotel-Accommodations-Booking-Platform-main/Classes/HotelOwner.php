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
 * Description of HotelOwner
 *
 * @author dilha
 */
class HotelOwner {
    //put your code here
    private $ownerid;
    private $fname;
    private $lname;
    private $contact;
    private $email;
    private $password;
    private $gender;
    
    public function __construct($fname, $lname, $contact, $email, $password, $gender) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->contact = $contact;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
    }
    public function registerHOwner(){
        $query = "INSERT INTO HotelOwner(ownerFirstName,ownerLastName,ownerGender,ownerPhoneNo,ownerEmail,ownerPassword) VALUES(?,?,?,?,?,?)";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->fname);
            $pstmt->bindValue(2, $this->lname);
            $pstmt->bindValue(3, $this->gender);
            $pstmt->bindValue(4, $this->contact);
            $pstmt->bindValue(5, $this->email);
            $pstmt->bindValue(6, $this->password);

            $pstmt->execute();
            
            if($pstmt->rowCount()>0){
                header("Location:../web-pages/login.php?success=2");
            }
            
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
    
    public function updateOwner($ownerid,$fname,$lname,$email,$contact,$profilePic){
        
        $query = "UPDATE hotelowner SET ownerFirstName=?, ownerLastName=? , ownerEmail=?, ownerPhoneNo=?, profilePic=? WHERE ownerId =?";
        $dbcon = new DBConnecter();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $fname);
            $pstmt->bindValue(2, $lname);
            $pstmt->bindValue(3, $email);
            $pstmt->bindValue(4, $contact);
            $pstmt->bindValue(5, $profilePic);
            $pstmt->bindValue(6, $ownerid);
            $pstmt->execute();
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
}
