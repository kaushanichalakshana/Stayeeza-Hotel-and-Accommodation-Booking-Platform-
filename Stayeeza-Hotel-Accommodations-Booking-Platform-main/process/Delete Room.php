<?php

use Classes\Hotels;


require_once "../Classes/Hotels.php";
$hotel_room = new Hotels();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['room_id'])) {
        $room_id = $_POST['room_id'];
        if($hotel_room->deleteHotelRoom($room_id)){
            header('Location:../web-pages/HOTEL ADD ROOMS.php?error ');
        }

    }
}
?>