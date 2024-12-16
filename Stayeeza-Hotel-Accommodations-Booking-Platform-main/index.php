<?php
setcookie("orderId", "", time() - (86400 * 30), "/");
setcookie("hotelname", "", time() - (86400 * 30), "/");
setcookie("bookingId", "", time() - (86400 * 30), "/");
setcookie("hotelId", "", time() - (86400 * 30), "/");

use Classes\Hotels;

require_once "Classes/Hotels.php";
$hotel_room = new Hotels();
$hotel_room->deleteIncompleteRows();




?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>stayeeza</title>
    <link rel="icon" href="assets/img/logo-32x32.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="assets/css/styles-home.css">
</head>

<body style="background: url(&quot;assets/img/download.png&quot;), #fff9e4;">
    <nav class="navbar navbar-expand-md py-3 navbar-light" style="background: #343a40;margin-top: -6px;padding-bottom: 22px;margin-bottom: -3px;padding-top: 5px;height: 86px;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img src="assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png" width="65" height="58" style="padding-left: 0px;"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1" style="color: rgb(240,245,251);font-family: Montserrat, sans-serif;margin: -2px;margin-left: 12px;background: #343a40;padding: 12px;">
                <?php session_start();


                ?>
                <ul class="navbar-nav me-auto nav-clr">
                    <li class="nav-item"><a class="nav-link active nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="web-pages/about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="web-pages/search_hotel.php">Hotels</a></li>

                    <?php if (isset($_SESSION['email'])) {

                    ?>
                        <?php if ($_SESSION['isowner']) {
                        ?>
                            <li class="nav-item"><a class="nav-link hide" href="web-pages/HOTEL ADD DETAILS.php">Add Hotel</a></li>
                        <?php
                        } ?>

                        <?php if ($_SESSION['isadmin']) {
                        ?>
                            <li class="nav-item"><a class="nav-link hide" href="web-pages/adminpanel-user.php">Admin Panel</a></li>
                    <?php
                        }
                    } ?>

                </ul>

                <?php if (!isset($_SESSION['email'])) {

                ?>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="web-pages/login.php">LOG IN</a>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="web-pages/registration.php">REGISTER</a>

                    <?php } else {
                    if ($_SESSION['isadmin']) {
                    ?>

                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="web-pages/adminpanel-user.php">Admin <?php echo $_SESSION["username"]; ?></a>
                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="process/logout.php">LOG OUT</a>
                    <?php
                    } elseif ($_SESSION['isowner']) {
                    ?>
                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="web-pages/userprofile.php?owner=<?php echo $_SESSION["userid"]; ?>"><i class="fas fa-light fa-user"></i> <?php echo $_SESSION["username"]; ?></a>
                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="process/logout.php">LOG OUT</a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="web-pages/userprofile.php?user=<?php echo $_SESSION["userid"]; ?>"><i class="fas fa-light fa-user"></i> <?php echo $_SESSION["username"]; ?></a>
                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="process/logout.php">LOG OUT</a>
                <?php
                    }
                }

                ?>
            </div>
        </div>
    </nav>
    <section class="py-4 py-xl-5 .header-container.back" style="background: url(&quot;assets/img/background.jpg&quot;) center / cover no-repeat;">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div class="heading">
                        <h2 class="text-uppercase fw-bold mb-3">Welcome to Stayeeza</h2>
                        <p class="mb-4">Discover the Art of Hospitality: Your Premier Destination for Unforgettable
                            Hotel Experiences and Seamless Accommodation Bookings.</p><a href="web-pages/search_hotel.php"><button class="btn btn-primary fs-5 me-2 py-2 px-4 btn-book" type="button" style="font-weight: bold;">Book Now</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container px-5" style="background: #343a40;margin-top: 16px;">
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6 align-items-center justify-content-center d-flex">
                <div class="m-xl-5" style="border-radius: 6px;"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;border-radius: 34px;" src="assets/img/1.gif"></div>
            </div>
            <div class="col-md-6 col-xl-6 d-md-flex align-items-md-center">
                <div>
                    <h2 class="text-uppercase fw-bold" style="font-family: Actor, sans-serif;color: rgb(255,255,255);text-align: center;">Your Ultimate
                        Guide to Effortless Hotel and Accommodation Bookings</h2>
                    <p class="my-3 mt-3" style="color: rgb(255,255,255);">Your One-Stop Destination for Effortless Hotel
                        and Accommodation Bookings. Browse Through a Vast Selection of Handpicked Properties, Discover
                        Exclusive Deals, and Experience a Seamless Booking Process that Puts Your Comfort and
                        Convenience at the Heart of Every Stay. </p><a class="btn btn-primary btn-lg me-3 col-12 mt-3" role="button" href="web-pages/search_hotel.php" style="font-weight: bold;">Book Your Room&nbsp;<i class="fas fa-light fas fa-bed fab fa-spin"></i></a>


                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="container">
            <div>
                <div class="row1" data-masonry="{&quot;percentPosition&quot;: true }">
                    <div class="col-xs-10 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card" style="background: rgb(33,37,41);border-style: none;box-shadow: 0px 0px 15px 3px #ffffff08;">
                            <picture type="" srcset=""><img class="card-img-top p-3" src="assets/img/1.jpg" alt="" style="border-radius: 24px;object-fit: cover;padding-bottom: 5px;margin-bottom: -11px;" width="286" height="286"></picture>
                            <div class="card-body" style="padding-top: 0px;padding-bottom: 16px;text-align: center;">
                                <h5 class="card-title" style="margin-bottom: 0px;color: rgb(255,255,255);">Grand Riviera
                                    Resort</h5>
                                <p class="card-text" style="margin-bottom: 0px;color: rgb(108, 117, 125);">Negambo,
                                    Sri Lanka</p>
                                <div class="btn-group" role="group" style="padding-top: 6px;border-style: none;"><a href="web-pages/search_hotel.php"><button class="btn btn-primary btn-d" type="button" style="border-radius: 56px;width: 156.325px;"><strong>Book
                                            Now</strong>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor">
                                            <path d="M115.4 136.8l102.1 37.35c35.13-81.62 86.25-144.4 139-173.7c-95.88-4.875-188.8 36.96-248.5 111.7C101.2 120.6 105.2 133.2 115.4 136.8zM247.6 185l238.5 86.87c35.75-121.4 18.62-231.6-42.63-253.9c-7.375-2.625-15.12-4.062-23.12-4.062C362.4 13.88 292.1 83.13 247.6 185zM521.5 60.51c6.25 16.25 10.75 34.62 13.13 55.25c5.75 49.87-1.376 108.1-18.88 166.9l102.6 37.37c10.13 3.75 21.25-3.375 21.5-14.12C642.3 210.1 598 118.4 521.5 60.51zM528 448h-207l65-178.5l-60.13-21.87l-72.88 200.4H48C21.49 448 0 469.5 0 496C0 504.8 7.163 512 16 512h544c8.837 0 16-7.163 16-15.1C576 469.5 554.5 448 528 448z">
                                            </path>
                                            </svg></button></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card" style="background: rgb(33,37,41);border-style: none;box-shadow: 0px 0px 15px 3px #ffffff08;">
                            <picture type="" srcset=""><img class="card-img-top p-3" src="assets/img/2-1.jpg" alt="" style="border-radius: 24px;object-fit: cover;padding-bottom: 5px;margin-bottom: -11px;" width="286" height="286"></picture>
                            <div class="card-body" style="padding-top: 0px;padding-bottom: 16px;text-align: center;">
                                <h5 class="card-title" style="margin-bottom: 0px;color: rgb(255,255,255);">Serenity
                                    Heights Lodge</h5>
                                <p class="card-text" style="margin-bottom: 0px;color: rgb(108, 117, 125);">Galle,
                                    Sri Lanka</p>
                                <div class="btn-group" role="group" style="padding-top: 6px;border-style: none;"><a href="web-pages/search_hotel.php"><button class="btn btn-primary btn-d" type="button" style="border-radius: 56px;width: 156.325px;"><strong>Book
                                            Now</strong>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor">
                                            <path d="M115.4 136.8l102.1 37.35c35.13-81.62 86.25-144.4 139-173.7c-95.88-4.875-188.8 36.96-248.5 111.7C101.2 120.6 105.2 133.2 115.4 136.8zM247.6 185l238.5 86.87c35.75-121.4 18.62-231.6-42.63-253.9c-7.375-2.625-15.12-4.062-23.12-4.062C362.4 13.88 292.1 83.13 247.6 185zM521.5 60.51c6.25 16.25 10.75 34.62 13.13 55.25c5.75 49.87-1.376 108.1-18.88 166.9l102.6 37.37c10.13 3.75 21.25-3.375 21.5-14.12C642.3 210.1 598 118.4 521.5 60.51zM528 448h-207l65-178.5l-60.13-21.87l-72.88 200.4H48C21.49 448 0 469.5 0 496C0 504.8 7.163 512 16 512h544c8.837 0 16-7.163 16-15.1C576 469.5 554.5 448 528 448z">
                                            </path>
                                            </svg></button></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card" style="background: rgb(33,37,41);border-style: none;box-shadow: 0px 0px 15px 3px #ffffff08;">
                            <picture type="" srcset=""><img class="card-img-top p-3" src="assets/img/3-2.jpg" alt="" style="border-radius: 24px;object-fit: cover;padding-bottom: 5px;margin-bottom: -11px;" width="286" height="286"></picture>
                            <div class="card-body" style="padding-top: 0px;padding-bottom: 16px;text-align: center;">
                                <h5 class="card-title" style="margin-bottom: 0px;color: rgb(255,255,255);">Tranquil
                                    Oasis Resort</h5>
                                <p class="card-text" style="margin-bottom: 0px;color: rgb(108, 117, 125);">Gampola
                                    , Sri Lanka</p>
                                <div class="btn-group" role="group" style="padding-top: 6px;border-style: none;"><a href="web-pages/search_hotel.php"><button class="btn btn-primary btn-d" type="button" style="border-radius: 56px;width: 156.325px;"><strong>Book
                                            Now</strong>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor">
                                            <path d="M115.4 136.8l102.1 37.35c35.13-81.62 86.25-144.4 139-173.7c-95.88-4.875-188.8 36.96-248.5 111.7C101.2 120.6 105.2 133.2 115.4 136.8zM247.6 185l238.5 86.87c35.75-121.4 18.62-231.6-42.63-253.9c-7.375-2.625-15.12-4.062-23.12-4.062C362.4 13.88 292.1 83.13 247.6 185zM521.5 60.51c6.25 16.25 10.75 34.62 13.13 55.25c5.75 49.87-1.376 108.1-18.88 166.9l102.6 37.37c10.13 3.75 21.25-3.375 21.5-14.12C642.3 210.1 598 118.4 521.5 60.51zM528 448h-207l65-178.5l-60.13-21.87l-72.88 200.4H48C21.49 448 0 469.5 0 496C0 504.8 7.163 512 16 512h544c8.837 0 16-7.163 16-15.1C576 469.5 554.5 448 528 448z">
                                            </path>
                                            </svg></button></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card" style="background: rgb(33,37,41);border-style: none;box-shadow: 0px 0px 15px 3px #ffffff08;">
                            <picture type="" srcset=""><img class="card-img-top p-3" src="assets/img/4.jpg" alt="" style="border-radius: 24px;object-fit: cover;padding-bottom: 5px;margin-bottom: -11px;" width="286" height="286"></picture>
                            <div class="card-body" style="padding-top: 0px;padding-bottom: 16px;text-align: center;">
                                <h5 class="card-title" style="margin-bottom: 0px;color: rgb(255,255,255);">Coastal Haven
                                    Hotel</h5>
                                <p class="card-text" style="margin-bottom: 0px;color: rgb(108, 117, 125);">Gampola,
                                    Sri Lanka</p>
                                <div class="btn-group" role="group" style="padding-top: 6px;border-style: none;"><a href="web-pages/search_hotel.php"><button class="btn btn-primary btn-d" type="button" style="border-radius: 56px;width: 156.325px;"><strong>Book
                                            Now</strong>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor">
                                            <path d="M115.4 136.8l102.1 37.35c35.13-81.62 86.25-144.4 139-173.7c-95.88-4.875-188.8 36.96-248.5 111.7C101.2 120.6 105.2 133.2 115.4 136.8zM247.6 185l238.5 86.87c35.75-121.4 18.62-231.6-42.63-253.9c-7.375-2.625-15.12-4.062-23.12-4.062C362.4 13.88 292.1 83.13 247.6 185zM521.5 60.51c6.25 16.25 10.75 34.62 13.13 55.25c5.75 49.87-1.376 108.1-18.88 166.9l102.6 37.37c10.13 3.75 21.25-3.375 21.5-14.12C642.3 210.1 598 118.4 521.5 60.51zM528 448h-207l65-178.5l-60.13-21.87l-72.88 200.4H48C21.49 448 0 469.5 0 496C0 504.8 7.163 512 16 512h544c8.837 0 16-7.163 16-15.1C576 469.5 554.5 448 528 448z">
                                            </path>
                                            </svg></button></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card" style="background: rgb(33,37,41);border-style: none;box-shadow: 0px 0px 15px 3px #ffffff08;">
                            <picture type="" srcset=""><img class="card-img-top p-3" src="assets/img/5.jpg" alt="" style="border-radius: 24px;object-fit: cover;padding-bottom: 5px;margin-bottom: -11px;" width="286" height="286"></picture>
                            <div class="card-body" style="padding-top: 0px;padding-bottom: 16px;text-align: center;">
                                <h5 class="card-title" style="margin-bottom: 0px;color: rgb(255,255,255);">Royal Garden
                                    Retreat</h5>
                                <p class="card-text" style="margin-bottom: 0px;color: rgb(108, 117, 125);">Kandy,
                                    Sri Lanka</p>
                                <div class="btn-group" role="group" style="padding-top: 6px;border-style: none;"><a href="web-pages/search_hotel.php"><button class="btn btn-primary btn-d" type="button" style="border-radius: 56px;width: 156.325px;"><strong>Book
                                            Now</strong>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor">
                                            <path d="M115.4 136.8l102.1 37.35c35.13-81.62 86.25-144.4 139-173.7c-95.88-4.875-188.8 36.96-248.5 111.7C101.2 120.6 105.2 133.2 115.4 136.8zM247.6 185l238.5 86.87c35.75-121.4 18.62-231.6-42.63-253.9c-7.375-2.625-15.12-4.062-23.12-4.062C362.4 13.88 292.1 83.13 247.6 185zM521.5 60.51c6.25 16.25 10.75 34.62 13.13 55.25c5.75 49.87-1.376 108.1-18.88 166.9l102.6 37.37c10.13 3.75 21.25-3.375 21.5-14.12C642.3 210.1 598 118.4 521.5 60.51zM528 448h-207l65-178.5l-60.13-21.87l-72.88 200.4H48C21.49 448 0 469.5 0 496C0 504.8 7.163 512 16 512h544c8.837 0 16-7.163 16-15.1C576 469.5 554.5 448 528 448z">
                                            </path>
                                            </svg></button></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card" style="background: rgb(33,37,41);border-style: none;box-shadow: 0px 0px 15px 3px #ffffff08;">
                            <picture type="" srcset=""><img class="card-img-top p-3" src="assets/img/6.jpg" alt="" style="border-radius: 24px;object-fit: cover;padding-bottom: 5px;margin-bottom: -11px;" width="286" height="286"></picture>
                            <div class="card-body" style="padding-top: 0px;padding-bottom: 16px;text-align: center;">
                                <h5 class="card-title" style="margin-bottom: 0px;color: rgb(255,255,255);">Oceanview
                                    Paradise Hotel</h5>
                                <p class="card-text" style="margin-bottom: 0px;color: rgb(108, 117, 125);">Kandy, Sri Lanka</p>
                                <div class="btn-group" role="group" style="padding-top: 6px;border-style: none;"><a href="web-pages/search_hotel.php"><button class="btn btn-primary btn-d" type="button" style="border-radius: 56px;width: 156.325px;"><strong>Book
                                            Now</strong>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor">
                                            <path d="M115.4 136.8l102.1 37.35c35.13-81.62 86.25-144.4 139-173.7c-95.88-4.875-188.8 36.96-248.5 111.7C101.2 120.6 105.2 133.2 115.4 136.8zM247.6 185l238.5 86.87c35.75-121.4 18.62-231.6-42.63-253.9c-7.375-2.625-15.12-4.062-23.12-4.062C362.4 13.88 292.1 83.13 247.6 185zM521.5 60.51c6.25 16.25 10.75 34.62 13.13 55.25c5.75 49.87-1.376 108.1-18.88 166.9l102.6 37.37c10.13 3.75 21.25-3.375 21.5-14.12C642.3 210.1 598 118.4 521.5 60.51zM528 448h-207l65-178.5l-60.13-21.87l-72.88 200.4H48C21.49 448 0 469.5 0 496C0 504.8 7.163 512 16 512h544c8.837 0 16-7.163 16-15.1C576 469.5 554.5 448 528 448z">
                                            </path>
                                            </svg></button></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card" style="background: rgb(33,37,41);border-style: none;box-shadow: 0px 0px 15px 3px #ffffff08;">
                            <picture type="" srcset=""><img class="card-img-top p-3" src="assets/img/7.jpg" alt="" style="border-radius: 24px;object-fit: cover;padding-bottom: 5px;margin-bottom: -11px;" width="286" height="286"></picture>
                            <div class="card-body" style="padding-top: 0px;padding-bottom: 16px;text-align: center;">
                                <h5 class="card-title" style="margin-bottom: 0px;color: rgb(255,255,255);">Cityscape
                                    Plaza Hotel</h5>
                                <p class="card-text" style="margin-bottom: 0px;color: rgb(108, 117, 125);">Rathnapura,
                                    Sri Lanka</p>
                                <div class="btn-group" role="group" style="padding-top: 6px;border-style: none;"><a href="web-pages/search_hotel.php"><button class="btn btn-primary btn-d" type="button" style="border-radius: 56px;width: 156.325px;"><strong>Book
                                            Now</strong>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor">
                                            <path d="M115.4 136.8l102.1 37.35c35.13-81.62 86.25-144.4 139-173.7c-95.88-4.875-188.8 36.96-248.5 111.7C101.2 120.6 105.2 133.2 115.4 136.8zM247.6 185l238.5 86.87c35.75-121.4 18.62-231.6-42.63-253.9c-7.375-2.625-15.12-4.062-23.12-4.062C362.4 13.88 292.1 83.13 247.6 185zM521.5 60.51c6.25 16.25 10.75 34.62 13.13 55.25c5.75 49.87-1.376 108.1-18.88 166.9l102.6 37.37c10.13 3.75 21.25-3.375 21.5-14.12C642.3 210.1 598 118.4 521.5 60.51zM528 448h-207l65-178.5l-60.13-21.87l-72.88 200.4H48C21.49 448 0 469.5 0 496C0 504.8 7.163 512 16 512h544c8.837 0 16-7.163 16-15.1C576 469.5 554.5 448 528 448z">
                                            </path>
                                            </svg></button></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card" style="background: rgb(33,37,41);border-style: none;box-shadow: 0px 0px 15px 3px #ffffff08;">
                            <picture type="" srcset=""><img class="card-img-top p-3" src="assets/img/umbrella-armchairs.jpg" alt="" style="border-radius: 24px;object-fit: cover;padding-bottom: 5px;margin-bottom: -11px;" width="286" height="286"></picture>
                            <div class="card-body" style="padding-top: 0px;padding-bottom: 16px;text-align: center;">
                                <h5 class="card-title" style="margin-bottom: 0px;color: rgb(255,255,255);">Sunset Sands
                                    Resort</h5>
                                <p class="card-text" style="margin-bottom: 0px;color: rgb(108, 117, 125);">Jaffna, Sri Lanka
                                </p>
                                <div class="btn-group" role="group" style="padding-top: 6px;border-style: none;"><a href="web-pages/search_hotel.php"><button class="btn btn-primary btn-d" type="button" style="border-radius: 56px;width: 156.325px;"><strong>Book
                                            Now</strong>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor">
                                            <path d="M115.4 136.8l102.1 37.35c35.13-81.62 86.25-144.4 139-173.7c-95.88-4.875-188.8 36.96-248.5 111.7C101.2 120.6 105.2 133.2 115.4 136.8zM247.6 185l238.5 86.87c35.75-121.4 18.62-231.6-42.63-253.9c-7.375-2.625-15.12-4.062-23.12-4.062C362.4 13.88 292.1 83.13 247.6 185zM521.5 60.51c6.25 16.25 10.75 34.62 13.13 55.25c5.75 49.87-1.376 108.1-18.88 166.9l102.6 37.37c10.13 3.75 21.25-3.375 21.5-14.12C642.3 210.1 598 118.4 521.5 60.51zM528 448h-207l65-178.5l-60.13-21.87l-72.88 200.4H48C21.49 448 0 469.5 0 496C0 504.8 7.163 512 16 512h544c8.837 0 16-7.163 16-15.1C576 469.5 554.5 448 528 448z">
                                            </path>
                                            </svg></button></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4 py-xl-5">
        <div class="text-center text-white-50 bg-primary border rounded border-0 p-3">
            <div class="row row-cols-2 row-cols-md-4">
                <div class="col">
                    <div class="p-3">
                        <h4 class="display-5 fw-bold text-white mb-0">100K+</h4>
                        <p class="mb-0">Rooms</p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <h4 class="display-5 fw-bold text-white mb-0">100+</h4>
                        <p class="mb-0">Hotels</p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <h4 class="display-5 fw-bold text-white mb-0">67+</h4>
                        <p class="mb-0">Accommodation</p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <h4 class="display-5 fw-bold text-white mb-0">25</h4>
                        <p class="mb-0">Locations</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4 py-xl-5" style="background: #343a40;">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto f-clr" style="width: 622px;">
                <h2 style="font-family: Audiowide, serif;">Share Your Experience: Rate and Review for a Better Journey
                </h2>
                <p class="w-lg-50" style="font-family: 'Autour One', serif;">Your feedback matters to us! Help us
                    enhance the travel experience for fellow adventurers by sharing your thoughts and ratings. Whether
                    you've stayed at a hotel, dined at a restaurant, or experienced a tour, your valuable feedback helps
                    us maintain high standards and guides others in making informed choices. Join our community of
                    travelers and contribute to creating better journeys for all.</p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col">
                <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/3-1.jpg">
                    <div class="card-body p-4" style="height: 390.8px;">
                        <p class="text-primary card-text mb-0"><i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                        </p>
                        <h4 class="card-title">Grand Horizon Hotel</h4>
                        <p class="card-text">"I recently stayed at Grand Horizon Hotel and was impressed by their
                            impeccable service. The staff went above and beyond to ensure my comfort and the facilities
                            were top-notch. The location was also perfect, with easy access to popular attractions. I
                            would definitely choose this hotel again for my next visit."</p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="assets/img/p2.jpg">
                            <div>
                                <p class="fw-bold mb-0">Emily Johnson</p>
                                <p class="text-muted mb-0">Traveler</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/2.jpg">
                    <div class="card-body p-4" style="height: 389.8px;">
                        <p class="text-primary card-text mb-0"><i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                        </p>
                        <h4 class="card-title">Blissful Retreat Inn</h4>
                        <p class="card-text">"Blissful Retreat Inn exceeded my expectations in every way. From the warm
                            welcome at check-in to the comfortable and well-appointed room, everything was simply
                            perfect. The inn's peaceful surroundings and charming decor created a truly blissful
                            atmosphere. I can't wait to return and experience their hospitality again!"</p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="assets/img/p1.jpg">
                            <div>
                                <p class="fw-bold mb-0">Benjamin Patel</p>
                                <p class="text-muted mb-0">Traveler</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/3.jpg">
                    <div class="card-body p-4" style="height: 390.8px;">
                        <p class="text-primary card-text mb-0"><i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                            <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                        </p>
                        <h4 class="card-title">Serene Haven Resort</h4>
                        <p class="card-text">"I had an amazing stay at Serene Haven Resort! The staff was incredibly
                            attentive, the rooms were spacious and beautifully designed, and the resort's serene
                            ambiance was just what I needed for a relaxing vacation. Highly recommend it for a tranquil
                            getaway!"</p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="assets/img/p3.jpg">
                            <div>
                                <p class="fw-bold mb-0">Sophia Thompson</p>
                                <p class="text-muted mb-0">Traveler</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4 py-xl-5" style="background: #343a40;">
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6">
                <div class="p-xl-2 m-xl-2"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;padding-right: 0px;" src="assets/img/aerial-view-pool.jpg" width="444" height="300"></div>
            </div>
            <div class="col-md-6 col-xxl-6 offset-xxl-0 d-md-flex align-items-md-center">
                <div style="width: 505px;">
                    <h2 class="text-uppercase fw-bold text-primary" style="font-family: 'Autour One', serif;text-align: center;">Expand Your Reach: Showcase Your
                        Hotel to a Global Audience</h2>
                    <p class="my-3" style="color: rgb(252,252,252);text-align: justify;">Promote your hotel to millions
                        of potential guests worldwide by adding your property to our platform. Gain visibility, increase
                        bookings, and connect with travelers seeking unforgettable experiences. With our user-friendly
                        interface and robust marketing tools, managing your hotel listing has never been easier. Join
                        our network and unlock a world of opportunities for your property</p><a class="btn btn-primary btn-lg me-3 col-12 mt-3" role="button" href="index.php" style="font-weight: bold;">Join US</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-xxl-3 footer-navigation col-sm-4">
                <h3><img src="assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png" width="149" height="139"></h3>
                <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Hotel</a><strong>&nbsp;</strong><a href="#"></a><a href="#"></a><strong> · </strong><a onclick="contactUs();" >Contact</a></p>
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
                <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
            </div>
        </div>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 1) {
        ?>

                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Login as a normal user!',

                    })
                </script>
            <?php
            }
        }
        if (isset($_GET['success'])) {

            if ($_GET['success'] == 1) {
            ?>

                <script>
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your Booking is Successful!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    
                </script>
        <?php
            }
            if ($_GET['success'] == 2) {
                ?>
    
                    <script>
                        Swal.fire({
                            
                            icon: "success",
                            title: "Review add Successful!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        
                    </script>
            <?php
                }
        }
        ?>
    </footer>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/415a9991c1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>