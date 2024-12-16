<?php
use Classes\Hotels;


require_once "../Classes/Hotels.php";


session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize form data.
    $ownerid = $_SESSION['userid'];
    $hotel_name = filter_var($_POST['hotel_name'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['location'], FILTER_SANITIZE_STRING); // Assuming 'location' is the name of the select input.
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $contact_email = filter_var($_POST['contact_email'], FILTER_SANITIZE_EMAIL);
    $contact_phone = filter_var($_POST['contact_phone'], FILTER_SANITIZE_STRING);

    if (empty($ownerid) || empty($hotel_name) || empty($address) || empty($city) || empty($description) || empty($contact_email) || empty($contact_phone)) {
        // Redirect to an error page with a message
        header('Location: error.php?message=One or more fields are empty');
        exit;
    }

// Validate email format
    if (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
        // Redirect to an error page with a message
        header('Location: error.php?message=Invalid email format');
        exit;
    }

// Validate phone number format (for example, 10 digits)
    if (!preg_match("/^[0-9]{10}$/", $contact_phone)) {
        // Redirect to an error page with a message
        header('Location: error.php?message=Invalid phone number format');
        exit;
    }


    // Create a new Hotels instance.
    $hotel = new Hotels();
    $hotel->setOwnerid($ownerid);
    $hotel->setHotelName($hotel_name);
    $hotel->setAddress($address);
    $hotel->setCity($city);
    $hotel->setDescription($description);
    $hotel->setContactEmail($contact_email);
    $hotel->setContactPhone($contact_phone);

    $creted_hotel_id = $hotel->addHotel();
    $_SESSION["hotelID"] = $creted_hotel_id;
    header('Location: ../web-pages/HOTEL ADD PHOTOS.php');


//    if ($hotel->addHotel()) {
//        // Redirect to a success page.
//        header('Location: HOTEL ADD PHOTOS.php');
//        exit;
//    } else {
//        // Redirect to an error page with a message
//        header('Location: error.php?message=Failed to add the hotel to the database');
//        exit;
//    }


} else {
    // Redirect to an error page for an invalid request.
    header('Location: error.php?message=Invalid request');
    exit;
}



