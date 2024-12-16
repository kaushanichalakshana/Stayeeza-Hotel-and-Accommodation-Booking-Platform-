<?php

require '../Classes/User.php';

use Classes\User;

require '../Classes/HotelOwner.php';

use Classes\HotelOwner;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$ownerid = $_SESSION['userid'];
if ($_SESSION['isowner']) {
    if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['contact'])) {
        if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['contact'])) {





            if (!preg_match("/^[a-zA-z]*$/", $_POST['fname'])) {
                header("Location:../web-pages/userprofile.php?owner=" . $ownerid . "&error=3");
            } else {
                $fname = $_POST['fname'];
                if (!preg_match("/^[a-zA-z]*$/", $_POST['lname'])) {
                    header("Location:../web-pages/userprofile.php?owner=" . $ownerid . "&error=3");
                } else {
                    $lname = $_POST['lname'];
                    if (!preg_match("/^[0-9]*$/", $_POST['contact'])) {
                        header("Location:../web-pages/userprofile.php?owner=" . $ownerid . "&error=4");
                    } else {
                        if (strlen($_POST['contact']) >= 9 && strlen($_POST['contact']) <= 12) {
                            $contact = $_POST['contact'];
                            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                header("Location:../web-pages/userprofile.php?owner=" . $ownerid . "&error=5");
                            } else {
                                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                                $propic = $_FILES["propic"];
                                if (isset($propic)) {
                                    $fileError = $propic["error"];
                                
                                   if($fileError === UPLOAD_ERR_OK){
                                    
                                    $image_type = exif_imagetype($propic["tmp_name"]);
                                    if ($image_type) {
                                        $image_extension = image_type_to_extension($image_type, true);
                                        $image_name = $ownerid . $image_extension;
                                        move_uploaded_file(
                                                // Temp image location
                                                $propic["tmp_name"],
                                                // New image location
                                                __DIR__ . "/../ownerProPic/" . $image_name
                                        );
                                        
                                    }
                                    }else{
                                       $image_name=$_POST["propic"];
                                   }
                                } 
                                $user = new HotelOwner($fname, $lname, $contact, $email, $password, $gender);
                                $user->updateOwner($ownerid, $fname, $lname, $email, $contact, $image_name);
                                $_SESSION["username"] = $fname;
                                header("Location:../web-pages/userprofile.php?owner=" . $ownerid . "&success=1");
                            }
                        } else {
                            header("Location:../web-pages/userprofile.php?owner=" . $ownerid . "&error=4");
                        }
                    }
                }
            }
        } else {
            header("Location:../web-pages/userprofile.php?owner=" . $ownerid . "&error=1");
        }
    } else {
        header("Location:userprofile.php?owner=" . $ownerid . "&error=2");
    }
} else {
    if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['contact'])) {
        if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['contact'])) {
            if (!preg_match("/^[a-zA-z]*$/", $_POST['fname'])) {
                header("Location:../web-pages/userprofile.php?user=" . $ownerid . "&error=3");
            } else {
                $fname = $_POST['fname'];
                if (!preg_match("/^[a-zA-z]*$/", $_POST['lname'])) {
                    header("Location:../web-pages/userprofile.php?user=" . $ownerid . "&error=3");
                } else {
                    $lname = $_POST['lname'];
                    if (!preg_match("/^[0-9]*$/", $_POST['contact'])) {
                        header("Location:../web-pages/userprofile.php?user=" . $ownerid . "&error=4");
                    } else {
                        if (strlen($_POST['contact']) >= 9 && strlen($_POST['contact']) <= 12) {
                            $contact = $_POST['contact'];
                            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                header("Location:../web-pages/userprofile.php?user=" . $ownerid . "&error=5");
                            } else {
                                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                                $propic = $_FILES["propic"];
                                if (isset($propic)) {
                                    $fileError = $propic["error"];
                                
                                   if($fileError === UPLOAD_ERR_OK){
                                    $image_type = exif_imagetype($propic["tmp_name"]);
                                    if ($image_type) {
                                        $image_extension = image_type_to_extension($image_type, true);
                                        $image_name = $ownerid . $image_extension;
                                        move_uploaded_file(
                                                // Temp image location
                                                $propic["tmp_name"],
                                                // New image location
                                                __DIR__ . "/../userProPic/" . $image_name
                                        );
                                        
                                    }
                                   }else{
                                       $image_name=$_POST["propic"];
                                   }
                                }      
                                $user = new User($fname, $lname, $contact, $email, $password, $gender);
                                $user->updateUser($ownerid, $fname, $lname, $email, $contact,$image_name);
                                $_SESSION["username"] = $fname;
                                header("Location:../web-pages/userprofile.php?user=" . $ownerid . "&success=1");
                            }
                        } else {
                            header("Location:../web-pages/userprofile.php.php?user=" . $ownerid . "&error=4");
                        }
                    }
                }
            }
        } else {
            header("Location:../web-pages/userprofile.php?user=" . $ownerid . "&error=1");
        }
    } else {
        header("Location:../web-pages/userprofile.php?user=" . $ownerid . "&error=2");
    }
}


