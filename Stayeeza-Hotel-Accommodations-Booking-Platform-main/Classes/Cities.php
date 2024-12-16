<?php

namespace Classes;
require_once 'DBConnecter_2.php';

class Cities {
    private $db;

    public function __construct() {
        $this->db = new DBConnecter2();
    }

    public function getAllCities() {
        $connection = DBConnecter2::getConnection();

        $query = "SELECT name_en FROM cities";

        $statement = $connection->prepare($query);

        $statement->execute();

        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }
}
