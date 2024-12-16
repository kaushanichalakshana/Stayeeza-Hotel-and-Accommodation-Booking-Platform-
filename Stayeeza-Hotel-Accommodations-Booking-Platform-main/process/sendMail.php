<?php
require '../Classes/login.php';
use Classes\login;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST["email"])) {
    if (!empty($_POST["email"])) {
        
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $user = new login();
        $id;
        if($user->checkUser($email)){
            
            
                 
                    
                    $rs = $user->loadUser($email);
                 foreach ($rs as $result){
                    $id = $result['userId'];
                    
                 }
                    
                
            }
            
            if($user->checkowner($email)){
            
            
                 
                    
                    $rs = $user->loadOwner($email);
                 foreach ($rs as $result){
                    $id = $result['ownerId'];
                    
                 }
                    
                
            }
            
            
        
    
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
    $mail->setFrom('stayeeza@gmail.com', 'Stayeeza Forgot Password');
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
    $mail->Subject = 'Forgot Password';
    
    if($user->checkUser($email)){
    $mail->Body    = 'You can reset your password.click <b><a href="localhost/Project-1/web-pages/resetPassword.php?userId='.$id.'">Reset Password</a></b>';
    }
    if($user->checkowner($email)){
    $mail->Body    = 'You can reset your password.click <b><a href="localhost/Project-1/web-pages/resetPassword.php?ownerId='.$id.'">Reset Password</a></b>';
    }
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
    header("Location:../web-pages/login.php?success=3");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}}