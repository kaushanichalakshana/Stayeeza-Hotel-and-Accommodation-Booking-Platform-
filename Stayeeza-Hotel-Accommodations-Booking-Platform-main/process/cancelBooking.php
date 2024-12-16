<?php
require '../Classes/Booking.php';

use Classes\Booking;
$bookingId = $_COOKIE["bookingId"];
$booking = new Booking();
$booking->cancelBooking($bookingId);
$booking->cancelPayment($bookingId);
$booking->deletePayment();
setcookie("orderId", "", time() - (86400 * 30), "/");
setcookie("hotelname", "", time() - (86400 * 30), "/");
setcookie("bookingId", "", time() - (86400 * 30), "/");
setcookie("hotelId", "", time() - (86400 * 30), "/");

header("Location:../web-pages/search_hotel.php?error=1");

