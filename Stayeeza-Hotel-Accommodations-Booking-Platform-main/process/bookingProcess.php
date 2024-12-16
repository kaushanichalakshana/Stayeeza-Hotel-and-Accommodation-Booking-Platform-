

<?php
session_start();
require '../Classes/Payment.php';

use Classes\Paayment;
require '../Classes/Hotel.php';

use Classes\Hotel;

if (!($_SESSION['isuser'])) {
    if (!isset($_SESSION['email'])){
    header("Location:../web-pages/Login.php");
    }
    else{
    header("Location:../index.php?error=1");
}
}



elseif (isset($_POST['hname'], $_POST['date'], $_POST['roomSelect'], $_POST['nights'], $_POST['fullprice'])) {
    if (!empty($_POST['hname']) || !empty($_POST['date']) || !empty($_POST['roomSelect']) || !empty($_POST['nights']) || !empty($_POST['fullprice'])) {

        $hname = $_POST['hname'];
        $roomSelect = $_POST['roomSelect'];
        
        
        if (!preg_match("/^[0-9]*$/", $_POST['nights'])) {
            header("Location:../web-pages/show_hotel.php?error=5");
        } else {
            if (strlen($_POST['nights']) > 0 && strlen($_POST['nights']) <= 5) {
                $nights = $_POST['nights'];
            } else {
                header("Location:../web-pages/show_hotel.php?error=5");
            }
        }
        if (!preg_match("/^[0-9]*$/", $_POST['fullprice'])) {
            header("Location:../web-pages/show_hotel.php?error=6");
        } else {

            $amount = $_POST['fullprice'];
        }
        $hotelid = $_POST["hotelid"];
        $userid = $_SESSION["userid"];;
        $bookingdate = $_POST['date'];
        $prefix = "bk";
        $timestamp = time();
        $uniquePart = substr(md5(uniqid(rand(), true)), 0, 4); // Generate a random 4-character string
        $hotelname = $_POST["hotelname"];
        $bookingid = $prefix . $timestamp . $uniquePart;
        $room = new Hotel();
        $rs=$room->viewRoomType($roomSelect);
        
        foreach($rs as $results){
            $roomtype = $results["room_type"];
            $roomid = $results["room_id"];
        }
        $booking = new Paayment($bookingid, $userid, $hotelid, $nights, $bookingdate, $amount, $roomid, $roomtype);
        setcookie("hotelId", $hotelid, time() + (86400 * 30), "/");
        setcookie("bookingId", $bookingid, time() + (86400 * 30), "/");
        setcookie("hotelname", $hotelname, time() + (86400 * 30), "/");
        $booking->registerPayment();
        
    } else {
        header("Location:../web-pages/show_hotel.php?error=2");
    }
} else {
    header("Location:../web-pages/show_hotel.php?error=1");
}


