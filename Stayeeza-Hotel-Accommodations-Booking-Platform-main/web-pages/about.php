<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>About Us</title>
    <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles-home.css">
</head>
    <body style="background: url(&quot;../assets/img/download.png&quot;), #fff9e4;">
         <nav class="navbar navbar-expand-md py-3 navbar-light"
        style="background: #343a40;margin-top: -6px;padding-bottom: 22px;margin-bottom: -3px;padding-top: 5px;height: 86px;">
             <div class="container"><a class="navbar-brand d-flex align-items-center" href="../index.php"><img
                    src="../assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png" width="65"
                    height="58" style="padding-left: 0px;"></a><button data-bs-toggle="collapse" class="navbar-toggler"
                data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1"
                style="color: rgb(240,245,251);font-family: Montserrat, sans-serif;margin: -2px;margin-left: 12px;background: #343a40;padding: 12px;">
                <?php session_start();
                    
            
            ?>
                <ul class="navbar-nav me-auto nav-clr">
                    <li class="nav-item"><a class="nav-link  nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="search_hotel.php">Hotels</a></li>
                    
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
        <section class="abo">
            <div class="heading">
                <h1>About Us</h1>
            </div>
            <div class="container">
                
                <div class="abo-content">
                    <h2>Where Your Dream Stay Begins!</h2>
                    <p>At Stayeeza, we're more than just a booking platform; we're your trusted companion on your journey to unforgettable experiences.
                        With a passion for travel and a commitment to excellence, we've created a seamless, user-friendly website that simplifies the process of finding and booking the perfect accommodation.<br><br>
                        To make travel planning effortless and enjoyable for every wanderer. Whether you're a globetrotter, a family on vacation, a solo adventurer, or a business traveler, we're here to cater to your unique needs. 
                        We understand that your accommodation is more than just a place to sleep; it's an integral part of your travel experience.
                    </p>
                </div>
                <div class="abo-image">
                    <img src="https://i.pinimg.com/564x/2c/ab/58/2cab58b38db6da041ac99cc80eb51a7d.jpg">
                </div>
            </div>
        </section>
         <footer>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-xxl-3 footer-navigation col-sm-4">
                <h3><img src="../assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png"
                        width="149" height="139"></h3>
                <p class="links"><a href="../index.php">Home</a><strong> · </strong><a href="about.php">About</a><strong> · </strong><a
                        href="search_hotel.php">Hotel</a><strong>&nbsp;</strong><a href="#"></a><a href="#"></a><strong> · </strong><a
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
                    <p> <a href="#" target="_blank">support@stayeeza.com</a></p>
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
    </body>
    <script src="https://kit.fontawesome.com/415a9991c1.js" crossorigin="anonymous"></script>
</html>
