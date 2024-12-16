<?php

use Classes\Hotels;


require_once "../Classes/Hotels.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotel_room = new Hotels();
    $hotel_room->addDoneToTheRow($_SESSION['hotelID']);
    header('Location: ../index.php');
}
?>

