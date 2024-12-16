<?php
require '../Classes/Booking.php';
use Classes\Booking;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$merchant_id         = $_POST['merchant_id'];
$order_id            = $_POST['order_id'];
$payhere_amount      = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig              = $_POST['md5sig'];

$merchant_secret = 'MzE1NTg1NDY5NTI0MjMzMzEzMzQ0MDY2OTY3NTM5MzM4NzMwMTA='; // Replace with your Merchant Secret

$local_md5sig = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        $payhere_amount . 
        $payhere_currency . 
        $status_code . 
        strtoupper(md5($merchant_secret)) 
    ) 
);
       
if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
        //TODO: Update your database as payment success
    $status = "Complete";
    $test= new Booking();
    $test->test1($status);
    header("location:../index.php?error=9");
}
else{
    header("location:../index.php");
}



