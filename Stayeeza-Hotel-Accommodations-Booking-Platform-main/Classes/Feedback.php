<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;
require 'DBConnecter_3.php';
use Classes\DBConnecter_3;
use PDO;
use PDOException;
/**
 * Description of Feedback
 *
 * @author dilha
 */
class Feedback {    
    
        private $hotelId;
        private $count;
        private $star;
    function __construct() {
        
    }
    function setHotelId($hotelId) {
        $this->hotelId = $hotelId;
    }

    public function saveReview($userId,$user_rating,$user_review,$hotel_id){
        $query = "INSERT INTO hotel_reviews(userId,user_rating,user_review,hotelId) VALUES(?,?,?,?)";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(1,$userId);
            $pstmt->bindParam(2,$user_rating);
            $pstmt->bindParam(3,$user_review);
            $pstmt->bindParam(4,$hotel_id);
            
            $pstmt->execute();

           if($pstmt->rowCount()>0){
                header("Location:../index.php?success=2");
            }
            
            
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function getCountReviws($hotelId){
        $query = "SELECT * FROM hotel_reviews WHERE hotelId=?";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(1,$hotelId);
            
            $pstmt->execute();
            $this->star = $pstmt->rowCount();
            
            return $pstmt->rowCount();
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }
    public function getCountFiveStar($hotelId){
        $query = "SELECT * FROM hotel_reviews WHERE hotelId=? AND user_rating=5";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(1,$hotelId);
            
            $pstmt->execute();
            return $pstmt->rowCount();
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

    public function fiveStarRaw($ReviwCount,$fiveStarCount){
        if($ReviwCount==null){
            return 0;
        }
        else{$fiveStarRawWidth =$fiveStarCount/$ReviwCount * 100;
        return $fiveStarRawWidth;
        }
    }

    public function getCountFourStar($hotelId){
        $query = "SELECT * FROM hotel_reviews WHERE hotelId=? AND user_rating=4";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(1,$hotelId);
            
            $pstmt->execute();
            return $pstmt->rowCount();
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

    public function fourStarRaw($ReviwCount,$fourStarCount){
        if($ReviwCount==null){
            return 0;
        }
        else{$fourStarRawWidth =$fourStarCount/$ReviwCount * 100;
        return $fourStarRawWidth;
        }
    }
    //put your code here

    public function getCountThreeStar($hotelId){
        $query = "SELECT * FROM hotel_reviews WHERE hotelId=? AND user_rating=3";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(1,$hotelId);
            
            $pstmt->execute();
            return $pstmt->rowCount();
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

    public function threeStarRaw($ReviwCount,$threeStarCount){
        if($ReviwCount==0){
            return 0;
        }
        else{$threeStarRawWidth =$threeStarCount/$ReviwCount * 100;
        return $threeStarRawWidth;
        }
    }public function getCountTwoStar($hotelId){
        $query = "SELECT * FROM hotel_reviews WHERE hotelId=? AND user_rating=2";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(1,$hotelId);
            
            $pstmt->execute();
            return $pstmt->rowCount();
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

    public function twoStarRaw($ReviwCount,$twoStarCount){
        if($ReviwCount==null){
            return 0;
        }
        else{$twoStarRawWidth =$twoStarCount/$ReviwCount * 100;
        return $twoStarRawWidth;
        }
    }public function getCountOneStar($hotelId){
        $query = "SELECT * FROM hotel_reviews WHERE hotelId=? AND user_rating=1";
        $dbcon = new DBConnecter_3();
        try {
            $con = $dbcon->getConnection();
            $pstmt = $con->prepare($query);
            $pstmt->bindParam(1,$hotelId);
            
            $pstmt->execute();

            return $pstmt->rowCount();
        } catch(PDOException $e){
            echo $e->getMessage();
            
        }
    }

    public function fourOneRaw($ReviwCount,$oneStarCount){
        if($ReviwCount==null){
            return 0;
        }
        else{$oneStarRawWidth =$oneStarCount/$ReviwCount * 100;
        return $oneStarRawWidth;
        }
    }


// all count

public function allStars($hotelId){
    $query = "SELECT * FROM hotel_reviews WHERE hotelId=?";
    $dbcon = new DBConnecter_3();
    try {
        $con = $dbcon->getConnection();
        $pstmt = $con->prepare($query);
        $pstmt->bindParam(1,$hotelId);
        
        $pstmt->execute();
        
        $count=0;
        $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rs as $results){
            $count = $count+$results["user_rating"];
        }
      
        $this->count = $count;

    } catch(PDOException $e){
        echo $e->getMessage();
        
    }
}

public function ratings(){
    if($this->star == null){
        return number_format((float)0, 1, '.', '');;
    }
    else{
        return number_format((float)$this->count/$this->star, 1, '.', '');
    }
}

public function reviwDetails(){
    $query = "SELECT userFirstName,userLastName,profilePic,user_rating,user_review FROM hotel_reviews INNER JOIN user ON hotel_reviews.userId = user.userId WHERE hotelId=?";
    $dbcon = new DBConnecter_3();
    try {
        $con = $dbcon->getConnection();
        $pstmt = $con->prepare($query);
        $pstmt->bindParam(1,$this->hotelId);
        
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    } catch(PDOException $e){
        echo $e->getMessage();
        
    }
}

}
