<?php

use Classes\Hotels;

session_start();

require_once "../Classes/Hotels.php";
$hotel = new Hotels();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image_upload"])) {
    $uploadDir = '../upload/'; // Define the directory where the files will be uploaded
    $maxImages = 15; // Maximum number of images allowed

    // Create the "upload" directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadedFiles = $_FILES["image_upload"];
    $uploadedCount = count($uploadedFiles["name"]);
    $uploadedFilesCount = min($uploadedCount, $maxImages);

    for ($i = 0; $i < $uploadedFilesCount; $i++) {
        $tmpFilePath = $uploadedFiles["tmp_name"][$i];
        $fileType = strtolower(pathinfo($uploadedFiles["name"][$i], PATHINFO_EXTENSION));

        $hotel_last_id= $_SESSION['hotelID'];
        // Generate a unique filename for each uploaded file
        $fileName =$hotel_last_id.'_' . ($i + 1) . '.' . $fileType;

        $targetFilePath = $uploadDir . $fileName;

        // Check if the file type is allowed (JPEG images)
        if ($fileType == 'jpeg' || $fileType == 'jpg') {
            if (move_uploaded_file($tmpFilePath, $targetFilePath)) {
                $imageNames[] = $fileName;
                // File has been successfully uploaded
//                echo "File {$uploadedFiles['name'][$i]} uploaded as $fileName<br>";



            } else {
                // Error occurred while moving the file
                echo "Error uploading file: {$uploadedFiles['name'][$i]}<br>";
            }
        } else {
            // File type not allowed
            echo "File type not allowed: {$uploadedFiles['name'][$i]}<br>";
        }
    }
    $imageNamesString = implode(', ', $imageNames);

    $hotel->addImagesToDatabase($imageNamesString,$_SESSION['hotelID']);
    header('Location: ../web-pages/HOTEL ADD ROOMS.php?error='.$_SESSION['hotelID'].' ');
    // You can perform additional processing or database storage here if needed.
} else {
    // Handle the case where the form was not submitted or the file input was empty.
    echo "No files selected for upload.";
}
?>
