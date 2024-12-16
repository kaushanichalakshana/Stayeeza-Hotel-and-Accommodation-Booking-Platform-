<?php

require '../Classes/Payment.php';

use Classes\Paayment;

require '../Classes/User.php';

use Classes\User;




$bookingId = $_COOKIE['bookingId'];

$booking = new Paayment($bookingId, null, null, null, null, null, null,null);
$rs = $booking->loadBooking($bookingId);
foreach ($rs as $results) {

//$name = $_POST["name"];
    $amount = $results["bookingPrice"];
    $hotelid = $results["hotelId"];
    $userid = $results["userId"];
    $roomType = $results["roomType"];
}
$user = new User(null, null, null, null, null, null);
$rsuser = $user->viewUser($userid);
foreach ($rsuser as $results) {
    $fname = $results["userFirstName"];
    $lname = $results["userLastName"];
    $email = $results["userEmail"];
    $contact = $results["userPhoneNo"];
}


$rshotel = $booking->viewHotel($hotelid);
foreach ($rshotel as $results) {
    $hotelName = $results["hotel_name"];
    $hoteladdress = $results["address"];
    $hotelcity = $results["city"];
    
}


$order_id = uniqid();
$merchant_id = "1224581";
$currency = "LKR";
$merchant_secret = "MzE1NTg1NDY5NTI0MjMzMzEzMzQ0MDY2OTY3NTM5MzM4NzMwMTA=";
$hash = strtoupper(
        md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
        )
);
$array = [];


$array["fname"] = $fname;
$array["lname"] = $lname;
$array["email"] = $email;
$array["phoneNo"] = $contact;
$array["hotelName"] = $hotelName;
$array["address"] = $hoteladdress;
$array["city"] = $hotelcity;
$array["country"] = "Sri Lanka";

$array["amount"] = $amount;
$array["merchant_id"] = $merchant_id;
$array["order_id"] = $order_id;
$array["currency"] = $currency;
$array["hash"] = $hash;

$jsonObj = json_encode($array);


echo $jsonObj;

$date = date('Y-m-d');
;
$status = "Incomplete";
$booking->payment($order_id, $bookingId, $userid, $amount, $date, $hotelName,$roomType, $status);

setcookie("orderId", $order_id, time() + (86400 * 30), "/");


//$booking->sendMail($email, $hotelName, $order_id);

