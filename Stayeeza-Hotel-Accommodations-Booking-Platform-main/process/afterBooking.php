<?php
require '../Classes/Booking.php';
require '../Classes/Payment.php';

use Classes\Paayment;

use Classes\Booking;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$userId = $_COOKIE["userId"];

$user = new Booking();
$rs = $user->viewUser($userId);
foreach($rs as $results){
    $email = $results["userEmail"];
}

$hotelName = $_COOKIE["hotelname"];
$order_id = $_COOKIE["orderId"];
$hId = $_COOKIE["hotelId"];
$bookingId = $_COOKIE["bookingId"];
$status = "Complete" ;
$booking=new paayment(null, null, null, null, null, null,null, null);
$booking->UpdateStatus($status,$bookingId);
setcookie("orderId", "", time() - (86400 * 30), "/");
setcookie("hotelId", "", time() - (86400 * 30), "/");
setcookie("hotelname", "", time() - (86400 * 30), "/");
setcookie("bookingId", "", time() - (86400 * 30), "/");

$mail = new PHPMailer(true);



try {
    
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'stayeeza@gmail.com';                     //SMTP username
    $mail->Password   = 'okitsannbqagmnmy';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('stayeeza@gmail.com', 'Stayeeza Booking Successfully Completed');
    $mail->addAddress($email);     //Add a recipient
//    $mail->addAddress('ellen@example.com');               //Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Booking Successfully';
    
    
    $mail->Body    = 'Booking has been successfully completed on Stayeeza!!!<br>Booking details:<br>Hotel name : <b>'.$hotelName.'</b><br>Booking ID : <b>'.$order_id.'</b><br>Your reservation is now confirmed.. <br><a href="localhost/Project-1/web-pages/add_review.php?uId='.$userId.'&hId='.$hId.'">Submit Review</a>';
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
    header("Location:../index.php?success=1");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>