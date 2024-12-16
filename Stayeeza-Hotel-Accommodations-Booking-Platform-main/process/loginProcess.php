<?php

require '../Classes/login.php';
use Classes\login;

session_start();

$username = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST["password"];
if (isset($_POST["email"], $_POST["password"])) {
    if (!empty($_POST["email"] && $_POST["password"])) {
        
        
        $user = new login();
        
        
        if($user->checkAdmin($username)>0){
           $D_Pass=$user->verifyAdmin($username);
            if (password_verify($password, $D_Pass)) {
                    $rs = $user->loadAdmin($username);
                 foreach ($rs as $result){
                    session_start();
                    $_SESSION["email"] = $result['adminEmail'];
                    $_SESSION["username"] = $result['adminFirstName'];
                    $_SESSION["userid"]= $result['adminId'];
                    $_SESSION["isuser"] = false;
                    $_SESSION["isadmin"] = TRUE;
                    $_SESSION["isowner"] = false;
                    setcookie("email", $result['adminEmail'], time() + (86400 * 30), "/");
                    setcookie("fname", $result['adminFirstName'], time() + (86400 * 30), "/");
                    setcookie("userId", $result['adminId'], time() + (86400 * 30), "/");
                 }
                 
                    header("Location:../index.php");
                 
                
            } else {


                header("Location:../web-pages/login.php?error=1");
            } 
        }
        
        
        
        else if($user->checkUser($username)){
            $D_Pass=$user->verifyUser($username);
            if (password_verify($password, $D_Pass)) {
                 
                    
                    $rs = $user->loadUser($username);
                 foreach ($rs as $result){
                    session_start();
                    $_SESSION["email"] = $result['userEmail'];
                    $_SESSION["username"] = $result['userFirstName'];
                    $_SESSION["userid"]= $result['userId'];
                    $_SESSION["isuser"] = true;
                    $_SESSION["isadmin"] = false;
                    $_SESSION["isowner"] = false;
                    setcookie("email", $result['userEmail'], time() + (86400 * 30), "/");
                    setcookie("fname", $result['userFirstName'], time() + (86400 * 30), "/");
                    setcookie("userId", $result['userId'], time() + (86400 * 30), "/");
                 }
                    header("Location:../index.php");
                
            } else {


                header("Location:../web-pages/login.php?error=1");
            }
        }
        
        
        
        else if($user->checkOwner($username)){
            $D_Pass=$user->verifyOwner($username);
            if (password_verify($password, $D_Pass)) {
                 
                    $rs = $user->loadOwner($username);
                 foreach ($rs as $result){
                    session_start();
                    $_SESSION["email"] = $result['ownerEmail'];
                    $_SESSION["username"] = $result['ownerFirstName'];
                    $_SESSION["userid"]= $result['ownerId'];
                    $_SESSION["isuser"] = false;
                    $_SESSION["isadmin"] = false;
                    $_SESSION["isowner"] = TRUE;
                    setcookie("email", $result['ownerEmail'], time() + (86400 * 30), "/");
                    setcookie("fname", $result['ownerFirstName'], time() + (86400 * 30), "/");
                    setcookie("userId", $result['ownerId'], time() + (86400 * 30), "/");
                 }

                    header("Location:../index.php");
                
            } else {


                header("Location:../web-pages/login.php?error=1");
            }
        }
        
        else{
            header("Location:../web-pages/login.php?error=1");
        }
        
    
}
}

