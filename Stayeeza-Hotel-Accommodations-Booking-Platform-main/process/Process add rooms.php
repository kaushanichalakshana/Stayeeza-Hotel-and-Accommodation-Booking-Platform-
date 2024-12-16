<?php

use Classes\Hotels;


require_once "../Classes/Hotels.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an array to store validation errors
    $errors = [];

    // Sanitize and validate each field
    $room_type = $_POST["room_type"];
    $price_per_night = filter_var($_POST["price_per_night"], FILTER_SANITIZE_NUMBER_INT);
    $max_people_allowed = filter_var($_POST["max_people_allowed"], FILTER_SANITIZE_NUMBER_INT);

    // Validate Room Type (assuming "single," "double," and "suite" are the only valid options)
    if (!in_array($room_type, ["single", "double", "suite", "twin", "deluxe", "executive", "family", "connecting", "accessible"])) {
        $errors[] = "Invalid room type";
    }

    // Validate Price Per Night (ensure it's a positive number)
    if ($price_per_night <= 0) {
        $errors[] = "Invalid price per night";
    }

    // Validate Max People Allowed (ensure it's a positive number)
    if ($max_people_allowed <= 0) {
        $errors[] = "Invalid max people allowed";
    }

    // Sanitize Amenities (an array of selected checkboxes)
    $amenities = $_POST["amenities"];
    $amenitiesString = implode(', ', $amenities);
    // You can further validate the amenities if needed

    // If there are no errors, you can process and store the data
    if (empty($errors)) {
        // Process and store the form data in your database or perform other actions
        $hotel = new Hotels();

        $hotel_last_id=$_SESSION['hotelID'];

        if ($hotel->addRoomToDatabase($hotel_last_id, $room_type, $price_per_night, $max_people_allowed, $amenitiesString)) {
            // Redirect to a success page.
            header("Location: ../web-pages/HOTEL ADD ROOMS.php");
            exit;

        }
    }







}

