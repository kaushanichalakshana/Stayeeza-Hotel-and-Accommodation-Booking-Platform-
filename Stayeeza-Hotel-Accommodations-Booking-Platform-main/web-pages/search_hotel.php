<?php

use Classes\Cities;
require_once "../Classes/Cities.php";

$city = new Cities();



?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Hotels</title>
    <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles-hotels.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>


    <style>
        /* Add your other styles and media queries here */

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        footer {
            margin-top: auto;

        }

    </style>



</head>

<body>
<nav class="navbar navbar-expand-md py-3 navbar-light">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="../assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png" width="65"
                 height="58" alt="Stayeeza Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse rounded" id="navcol-1"><?php session_start();
                    
            
            ?>
                <ul class="navbar-nav me-auto nav-clr">
                    <li class="nav-item"><a class="nav-link nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link active"  href="search_hotel.php">Hotels</a></li>
                    
                    <?php if(isset($_SESSION['email'])){
            
            ?>
                    <?php if ($_SESSION['isowner']) {
                        ?>
                    <li class="nav-item"><a class="nav-link hide" href="HOTEL ADD DETAILS.php">Add Hotel</a></li>     
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

<div class="content">
    <section>
        <main class="page landing-page">
            <div class="container" style="margin-bottom: 10px; margin-top: 10px">


                <div class="row">
                    <div class="col">

                        <form method="post" action="show_hotel-1.php">
                            <div class="input-group mb-3 mx-auto" style="width: 80%;">
                                <input type="text" class="form-control" id="searchBox" name="Searched_city" placeholder="Search the City" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary me-3" type="submit" name="search_submit">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>


            </div>
        </main>
    </section>
</div>
<?php
if (isset($_GET['error'])) {
            if ($_GET['error'] == 1) {
                ?>

                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Booking is Unsuccessfull!',
                        
                    })
                </script>
                <?php
            }
        }
        ?>


<!--                                <select class="form-select" name="location" required>-->
<!--                                    <option value="" disabled selected>Search the City</option>-->
<!--                                    --><?php
//                                    // Assuming $cities contains the results from getAllCities
//                                    $cities = $city->getAllCities();
//
//                                    // Sort the cities array alphabetically by the 'name_en' field
//                                    usort($cities, function ($a, $b) {
//                                        return strcmp($a['name_en'], $b['name_en']);
//                                    });
//
//                                    foreach ($cities as $city) {
//                                        echo "<option value='" . htmlspecialchars($city['name_en']) . "'>" . htmlspecialchars($city['name_en']) . "</option>";
//                                    }
//                                    ?>
<!--                                </select>-->


<!-- Footer -->
<footer class="align-items-bottom">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-xxl-3 footer-navigation col-sm-4">
            <h3><img src="../assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png" width="149"
                     height="139"></h3>
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
                <p class="footer-center-info email text-start"> +1 555 123456</p>
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

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js "></script>
<script src="https://kit.fontawesome.com/415a9991c1.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

</body>

</html>