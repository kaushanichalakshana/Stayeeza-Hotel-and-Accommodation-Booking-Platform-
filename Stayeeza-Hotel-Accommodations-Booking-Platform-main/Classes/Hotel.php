<?php

namespace Classes;
require_once __DIR__ . '/DBConnecter_2.php';
use PDO;
use PDOException;

use Classes\DBConnecter2;

class Hotel
{


    private $hotelName;
    private $address;
    private $city;
    private $country;
    private $description;
    private $pricePerNight;
    private $amenities;
    private $contactEmail;
    private $contactPhone;

    private $uploadedFileName;

    public function getUploadedFileName() {
        return $this->uploadedFileName;
    }

    public function setUploadedFileName($fileName) {
        $this->uploadedFileName = $fileName;
    }

    public function setHotelName($hotelName)
    {
        $this->hotelName = $hotelName;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPricePerNight($pricePerNight)
    {
        $this->pricePerNight = $pricePerNight;
    }

    public function setAmenities($amenities)
    {
        $this->amenities = $amenities;
    }

    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
    }

    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;
    }

    public function saveToDatabase()
    {
        try {
            $connection = \classes\DBConnecter2::getConnection();


            $sql = "INSERT INTO hotels (hotel_name, address, city, country, description, price_per_night, amenities,image_upload, contact_email, contact_phone, created_at) 
                    VALUES (:hotelName, :address, :city, :country, :description, :pricePerNight, :amenities,:image_upload ,:contactEmail, :contactPhone, NOW())";


            $statement = $connection->prepare($sql);


            $statement->bindParam(':hotelName', $this->hotelName);
            $statement->bindParam(':address', $this->address);
            $statement->bindParam(':city', $this->city);
            $statement->bindParam(':country', $this->country);
            $statement->bindParam(':description', $this->description);
            $statement->bindParam(':pricePerNight', $this->pricePerNight);
            $amenitiesStr = implode(', ', $this->amenities); // Serialize amenities array
            $statement->bindParam(':amenities', $amenitiesStr);
            $statement->bindParam(':image_upload',$this->uploadedFileName);
            $statement->bindParam(':contactEmail', $this->contactEmail);
            $statement->bindParam(':contactPhone', $this->contactPhone);


            $statement->execute();


            $connection = null;

            return true;
        } catch (\PDOException $ex) {

            return false;
        }
    }


    public static function searchHotelsByLocation($country, $city)
    {
        try {
            $connection = \classes\DBConnecter2::getConnection();


            $sql = "SELECT * FROM hotels WHERE country = :country AND city = :city";


            $statement = $connection->prepare($sql);


            $statement->bindParam(':country', $country);
            $statement->bindParam(':city', $city);


            $statement->execute();


            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);


            $connection = null;

            return $results;
        } catch (\PDOException $ex) {

            return [];
        }
    }
    public function viewRoomType($id){
        $this->id=$id;
        $query = "SELECT * FROM hotel_rooms WHERE price_per_night=?";
        $dbcon = new DBConnecter2();
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




}

