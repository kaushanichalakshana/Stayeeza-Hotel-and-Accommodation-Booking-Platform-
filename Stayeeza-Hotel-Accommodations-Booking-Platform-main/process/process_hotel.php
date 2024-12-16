<?php

use Classes\Hotel;

require_once "../Classes/Hotel.php";
session_start();

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $hotel = new Hotel();

    try {

        if (empty($_POST['hotel_name']) || empty($_POST['address']) || empty($_POST['description']) || empty($_POST['price_per_night']) || empty($_POST['contact_email']) || empty($_POST['contact_phone']) || empty($_POST['location'])) {

            header("Location: ../web-pages/addhotel.php?status=2");

        } else {

            $hotelName = sanitizeInput($_POST['hotel_name']);
            $address = sanitizeInput($_POST['address']);
            $description = sanitizeInput($_POST['description']);
            $pricePerNight = floatval($_POST['price_per_night']); // Convert to float
            $amenities = isset($_POST['amenities']) ? $_POST['amenities'] : [];
            $contactEmail = $_POST['contact_email'];
            $contactPhone = $_POST['contact_phone'];
            $location = $_POST['location'];

            $parts = explode(':', $location);
            print_r($parts);
            $country = $parts[0];
            $city = $parts[1];


        foreach ($_FILES as $key => $file) {
            if ($file["error"] === UPLOAD_ERR_OK) {
                $uploadDir = '../uploads/';
                $allowedExtensions = ['jpg'];

                $fileInfo = pathinfo($file["name"]);
                $fileExtension = strtolower($fileInfo["extension"]);


                if (in_array($fileExtension, $allowedExtensions)) {

                    $uploadFilename = $hotelName . '_' . $key . '.' . $fileExtension;

                    $uploadPath = $uploadDir . $uploadFilename;


                    if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                        header("Location: ../addhotel.php?status=3");

                        $uploadFilenamesArr[] =$uploadFilename ;

                    } else {
                        header("Location: ../web-pages/addhotel.php?status=4");

                    }
                } else {
                    header("Location: ../web-pages/addhotel.php?status=5");

                }
            } else {
                header("Location: ../web-pages/addhotel.php?status=6");

            }
        }

        $hotel->setUploadedFileName(implode(', ', $uploadFilenamesArr));

        $hotel->setHotelName($hotelName);

        $hotel->setAddress($address);
        $hotel->setCity($city);
        $hotel->setCountry($country);
        $hotel->setDescription($description);
        $hotel->setPricePerNight($pricePerNight);
        $hotel->setAmenities($amenities);
        $hotel->setContactEmail($contactEmail);
        $hotel->setContactPhone($contactPhone);

        if ($hotel->saveToDatabase()) {
            header("Location: ../web-pages/addhotel.php?status=7");

        } else {
            header("Location: ../web-pages/addhotel.php?status=8");

        }
    }
    } catch (Exception $e) {
        header("Location: ../web-pages/addhotel.php?status=9");
    }
}
else{
    header("Location: ../web-pages/addhotel.php?status=1");
}
