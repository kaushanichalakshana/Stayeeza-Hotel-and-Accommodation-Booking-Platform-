<?php

namespace Classes;


require_once 'DBConnecter_2.php';

class Hotels {
    private $db;
    private $ownerid;
    private $hotel_name;
    private $address;
    private $city;
    private $description;
    private $contact_email;
    private $contact_phone;
    private $created_at;

    // Constructor to initialize the object
    public function __construct() {
        $this->db = new DBConnecter2();
    }

    public function setOwnerid($ownerid) {
        $this->ownerid = $ownerid;
    }

    public function setHotelName($hotel_name) {
        $this->hotel_name = $hotel_name;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setContactEmail($contact_email) {
        $this->contact_email = $contact_email;
    }

    public function setContactPhone($contact_phone) {
        $this->contact_phone = $contact_phone;
    }

    // Getters
    public function getOwnerid() {
        return $this->ownerid;
    }

    public function getHotelName() {
        return $this->hotel_name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

//    public function getDescription() {
//        return $this->description;
//    }

    public function getContactEmail() {
        return $this->contact_email;
    }

    public function getContactPhone() {
        return $this->contact_phone;
    }


    // Getters and Setters
    // ...

    // Function to add a new hotel to the database

    public function addHotel() {
        $conn = $this->db->getConnection(); // Use $this->db to access the DBConnecter2 instance
        $query = "INSERT INTO hotels (ownerid, hotel_name, address, city, description, contact_email, contact_phone) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        // Check if the statement was prepared successfully
        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bindParam(1, $this->ownerid); // Use $this->ownerid to access the class property
            $stmt->bindParam(2, $this->hotel_name); // Use $this->hotel_name to access the class property
            $stmt->bindParam(3, $this->address); // Use $this->address to access the class property
            $stmt->bindParam(4, $this->city); // Use $this->city to access the class property
            $stmt->bindParam(5, $this->description); // Use $this->description to access the class property
            $stmt->bindParam(6, $this->contact_email); // Use $this->contact_email to access the class property
            $stmt->bindParam(7, $this->contact_phone); // Use $this->contact_phone to access the class property
            $stmt->execute();
            $createdId = $conn->lastInsertId();
            return $createdId;
        } else {
            return true;
        }
    }
    public function addRoomToDatabase($hotel_id,$roomType, $pricePerNight, $maxPeopleAllowed, $amenities) {
        $conn = $this->db->getConnection(); // Use $this->db to access the DBConnecter2 instance

        $query = "INSERT INTO hotel_rooms (hotel_id,room_type, price_per_night, max_people_allowed,amenities) VALUES (?, ?, ?,?,?)";

        $stmt = $conn->prepare($query);

        // Check if the statement was prepared successfully
        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bindParam(1, $hotel_id); // Use $this->ownerid to access the class property
            $stmt->bindParam(2, $roomType); // Use $this->hotel_name to access the class property
            $stmt->bindParam(3, $pricePerNight); // Use $this->address to access the class property
            $stmt->bindParam(4, $maxPeopleAllowed); // Use $this->city to access the class property
            $stmt->bindParam(5, $amenities); // Use $this->description to access the class property


            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
    public function showHotelRooms($hotel_id){
        $conn = $this->db->getConnection();

        $query = "SELECT * FROM hotel_rooms WHERE hotel_id = ?";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $hotel_id);

        $stmt->execute();
        $results =  $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $results;

    }
    public function deleteHotelRoom($room_id)
    {
        $conn = $this->db->getConnection();
        $query = "DELETE FROM hotel_rooms WHERE room_id = ?";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $room_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
    public function getSearchedHotel($searchedCity)
    {
        $conn = $this->db->getConnection();
        $query = "SELECT * FROM hotels WHERE city LIKE ?";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $searchedCity);

        $stmt->execute();
        $results =  $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }
    public function addImagesToDatabase($imageNamesString,$hotel_id) {
        $conn = $this->db->getConnection(); // Use $this->db to access the DBConnecter2 instance

        $query = "UPDATE hotels SET uploaded_image = ? WHERE hotel_id = ?";

        $stmt = $conn->prepare($query);

        // Check if the statement was prepared successfully
        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bindParam(1, $imageNamesString);
            $stmt->bindParam(2, $hotel_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
    public function getLastHotelId() {
        $conn = $this->db->getConnection();
        $query = "SELECT hotel_id FROM hotels ORDER BY hotel_id DESC LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function addDoneToTheRow($hotelId){
        $conn = $this->db->getConnection();
        $query = "UPDATE hotels SET status = 'done' WHERE hotel_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, $hotelId);
        $stmt->execute();
    }
    public function deleteIncompleteRows(){
        $conn = $this->db->getConnection();
        $query = "DELETE FROM hotels WHERE status IS NULL";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }
}
