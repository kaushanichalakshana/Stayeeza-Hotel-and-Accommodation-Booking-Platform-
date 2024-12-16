<?php

namespace Classes;
require_once 'DBConnecter_2.php';

class Location {
    private $db;

    public function __construct() {
        $this->db = new DBConnecter2();
    }

    public function insertLocation($country, $city) {
        $country = $this->db->getConnection()->real_escape_string($country);
        $city = $this->db->getConnection()->real_escape_string($city);

        $query = "INSERT INTO location (country, city) VALUES ('$country', '$city')";

        if ($this->db->getConnection()->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllLocations() {
        $connection = \classes\DBConnecter2::getConnection();

        $query = "SELECT * FROM location";


        $locations = [];
        $statement = $connection->prepare($query);

        $statement->execute();


        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }
}
