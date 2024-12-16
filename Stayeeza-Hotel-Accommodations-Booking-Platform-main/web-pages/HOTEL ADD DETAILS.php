<?php

use Classes\Cities;
require_once "../Classes/Cities.php";

$city = new Cities();


session_start();
if(!isset($_SESSION['email'])){
    header("../Location:index.php");
}


if(isset($_GET['status'])){
    if($_GET['status'] == 1){
        echo '<script>alert("Please fill all fields and used Submit button");</script>';
    } elseif($_GET['status'] == 2){
        echo '<script>alert("Please fill all fields");</script>';
    } elseif($_GET['status'] == 3){
        echo '<script>alert("File uploaded successfully");</script>';
    } elseif($_GET['status'] == 4){
        echo '<script>alert("Error uploading file");</script>';
    } elseif($_GET['status'] == 5){
        echo '<script>alert("Invalid file format for Only JPG files are allowed");</script>';
    } elseif($_GET['status'] == 6){
        echo '<script>alert("Error uploading file");</script>';
    } elseif($_GET['status'] == 7){
        echo '<script>alert("Hotel data added successfully");</script>';
    }elseif($_GET['status'] == 8){
        echo '<script>alert("Failed to add hotel data");</script>';
    }elseif($_GET['status'] == 9){
        echo '<script>alert("An error occurred");</script>';
    }
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add Hotels</title>
    <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles-home.css">
</head>

<body>
<nav class="navbar navbar-expand-md py-3 navbar-light"
     style="background: #343a40;margin-top: -6px;padding-bottom: 22px;margin-bottom: -3px;padding-top: 5px;height: 86px;">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img
                    src="../assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png" width="65"
                    height="58" style="padding-left: 0px;"></a>
        <button data-bs-toggle="collapse" class="navbar-toggler"
                data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1"
             style="color: rgb(240,245,251);font-family: Montserrat, sans-serif;margin: -2px;margin-left: 12px;background: #343a40;padding: 12px;">
            <?php


            ?>
            <ul class="navbar-nav me-auto nav-clr">
                <li class="nav-item"><a class="nav-link  nav-link" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link " href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="search_hotel.php">Hotels</a></li>

                <?php if(isset($_SESSION['email'])){

                    ?>
                    <?php if ($_SESSION['isowner']) {
                        ?>
                        <li class="nav-item"><a class="nav-link active" href="HOTEL ADD DETAILS.php">Add Hotel</a></li>
                        <?php
                    } ?>

                    <?php if ($_SESSION['isadmin']) {
                        ?>
                        <li class="nav-item"><a class="nav-link hide" href="adminpanel-user.php">Admin Panel</a></li>
                        <?php
                    }
                }?>

            </ul>

            <?php if(!isset($_SESSION['email'])){

                ?>
                <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="login.php">LOG IN</a>
                <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="registration.php">REGISTER</a>

            <?php }else{
                if($_SESSION['isadmin']){
                    ?>

                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="adminpanel-user.php">Admin <?php echo $_SESSION["username"]; ?></a>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="../process/logout.php">LOG OUT</a>
                    <?php
                }elseif($_SESSION['isowner']){
                    ?>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="userprofile.php?owner=<?php echo $_SESSION["userid"]; ?>"><i class="fas fa-light fa-user"></i> <?php echo $_SESSION["username"]; ?></a>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="../process/logout.php">LOG OUT</a>
                    <?php
                }else{
                    ?>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="userprofile.php?user=<?php echo $_SESSION["userid"]; ?>"><i class="fas fa-light fa-user"></i> <?php echo $_SESSION["username"]; ?></a>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="../process/logout.php">LOG OUT</a>
                    <?php
                }
            }

            ?>
        </div>
    </div>
</nav>




<div class="col-12 d-flex mt-3">
    <div class="container-fluid d-flex justify-content-center">
        <div class="step-container" style="background-color: #ffc107;
    border-radius: 10px;
    padding: 10px;
    display: inline-block;">
            <label class="step-label" for="hotel_name" style="font-size: 20px;"><strong>Step 1</strong></label>
        </div>
    </div>
</div>


<div class="col-12 d-flex mt-3">
    <div class="container-fluid d-flex justify-content-center">
        <form class="col-md-12 col-sm-12 col-lg-8" method="post" action="../process/Process add hotel.php" enctype="multipart/form-data">
            <div class="card shadow mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="hotel_name"><strong>Hotel Name</strong></label>
                        <input class="form-control" type="text" id="hotel_name" name="hotel_name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="address"><strong>Address</strong></label>
                        <input class="form-control" type="text" id="address" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="City"><strong>City</strong></label>
                        <select class="form-select" name="location" required>
                            <option value="" disabled selected>Select city</option>
                            <?php
                            // Assuming $cities contains the results from getAllCities
                            $cities = $city->getAllCities();

                            // Sort the cities array alphabetically by the 'name_en' field
                            usort($cities, function ($a, $b) {
                                return strcmp($a['name_en'], $b['name_en']);
                            });

                            foreach ($cities as $city) {
                                echo "<option value='" . htmlspecialchars($city['name_en']) . "'>" . htmlspecialchars($city['name_en']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description"><strong>Description</strong></label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="contact_email"><strong>Contact Email</strong></label>
                        <input class="form-control" type="email" id="contact_email" name="contact_email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="contact_phone"><strong>Contact Phone</strong></label>
                        <input class="form-control" type="tel" id="contact_phone" name="contact_phone" required>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-primary btn-lg" type="submit">Next</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<footer>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-xxl-3 footer-navigation col-sm-4">
            <h3><img src="../assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png"
                     width="149" height="139"></h3>
            <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">About</a><strong> · </strong><a
                        href="#">Hotel</a><strong>&nbsp;</strong><a href="#"></a><a href="#"></a><strong> · </strong><a
                        href="#">Contact</a></p>
            <p class="company-name">Stayeeza © 2023 copyright</p>
        </div>
        <div class="col-sm-6 col-md-4 footer-contacts">
            <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                <p><span class="new-line-span">Passara Road</span> Badulla, Sri Lanka</p>
            </div>
            <div><i class="fa fa-phone footer-contacts-icon"></i>
                <p class="footer-center-info email text-start"> +94 775 123456</p>
            </div>
            <div class="align-items-center"><i class="fa fa-envelope footer-contacts-icon"></i>
                <p><a href="#" target="_blank">support@stayeeza.com</a></p>
            </div>
        </div>
        <div class="col-md-4 footer-about">
            <h4>About the company</h4>
            <p>Our website is your ultimate travel companion, offering a seamless experience from start to finish.
                Discover a vast selection of accommodations and experiences tailored to your preferences. </p>
            <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i
                            class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i
                            class="fa fa-github"></i></a></div>
        </div>
    </div>
</footer>
<script src="https://kit.fontawesome.com/415a9991c1.js" crossorigin="anonymous"></script>


</body>

</html>