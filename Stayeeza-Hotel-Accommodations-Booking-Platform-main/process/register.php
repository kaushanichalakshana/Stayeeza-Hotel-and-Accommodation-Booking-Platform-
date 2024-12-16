

<?php

require '../Classes/User.php';

use Classes\User;

require '../Classes/HotelOwner.php';

use Classes\HotelOwner;

if (isset($_POST['fname'], $_POST['lname'], $_POST['cNumber'], $_POST['email'], $_POST['pass'], $_POST['account'])) {
    if (!empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['cNumber']) || !empty($_POST['email']) || !empty($_POST['pass']) || !empty($_POST['account'])) {

        if (!preg_match("/^[a-zA-z]*$/", $_POST['fname'])) {
            header("Location:../web-pages/registration.php?error=3");
        } else {
            $fname = $_POST['fname'];
        }
        if (!preg_match("/^[a-zA-z]*$/", $_POST['lname'])) {
            header("Location:../web-pages/registration.php?error=3");
        } else {
            $lname = $_POST['lname'];
        }
        if (!preg_match("/^[0-9]*$/", $_POST['cNumber'])) {
            header("Location:../web-pages/registration.php?error=4");
        } else {
            if (strlen($_POST['cNumber']) >= 9 && strlen($_POST['cNumber']) <= 12) {
                $contact = $_POST['cNumber'];
                $contactAsString = (string)$contact;
                $firstThreeDigit = substr($contactAsString,0,3);
                $firstTwoDigit = substr($contactAsString,0,2);
                if($firstThreeDigit === "947"){
                    $contactNo = $contact;
                }
                elseif($firstTwoDigit==="07"){
                    $contactNo = $contact;
                }
                else {
                    header("Location:../web-pages/registration.php?error=4");
                }
            } else {
                header("Location:../web-pages/registration.php?error=4");
            }
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            header("Location:../web-pages/registration.php?error=5");
        } else {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        }
        if (strlen($_POST['pass']) >= 8 && strlen($_POST['pass']) <= 16) {
            $pass = $_POST['pass'];
            $pass2 = $_POST['pass2'];
            if ($pass === $pass2) {
                $hash_password = password_hash($pass, PASSWORD_DEFAULT);
            } else {
                header("Location:../web-pages/registration.php?error=6");
            }
        } else {
            header("Location:../web-pages/registration.php?error=7");
        }


        $gender = $_POST['gender'];
        $account = $_POST['account'];

        if ($account == "Personal") {
            $user = new User($fname, $lname, $contact, $email, $hash_password, $gender);
            $user->registerUser();
        } else {
            $HotelOwner = new HotelOwner($fname, $lname, $contact, $email, $hash_password, $gender);
            $HotelOwner->registerHOwner();
        }
    } else {
        header("Location:../web-pages/registration.php?error=2");
    }
} else {
    header("Location:../web-pages/registration.php?error=1");
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

