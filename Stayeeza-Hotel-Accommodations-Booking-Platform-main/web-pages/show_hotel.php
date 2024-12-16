<?php
require_once "../Classes/Feedback.php";
use Classes\Feedback;

use Classes\Hotels;

require_once "../Classes/Hotels.php";

$hotel = new Hotels();

$searched_city = $_POST['Searched_city'];

$searched_hotels = $hotel->getSearchedHotel($searched_city);
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>stayeeza</title>
    <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles-hotels.css">
    <link rel="stylesheet" href="../assets/css/styles-home.css">

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
        <div class="collapse navbar-collapse rounded" id="navcol-1">
            <?php session_start();


            ?>
            <ul class="navbar-nav me-auto nav-clr">
                <li class="nav-item"><a class="nav-link  nav-link" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link active" href="search_hotel.php">Hotels</a></li>

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
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="logout.php">LOG OUT</a>
                    <?php
                }elseif($_SESSION['isowner']){
                    ?>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="userprofile.php?owner=<?php echo $_SESSION["userid"]; ?>"><i class="fas fa-light fa-user"></i> <?php echo $_SESSION["username"]; ?></a>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="logout.php">LOG OUT</a>
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
                        <form method="post" action="show_hotel.php">
                            <div class="input-group mb-3 mx-auto" style="width: 80%;">

                                <form method="post" action="show_hotel.php">
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
                        </form>
                        <br>
                        <div class="search-results">
                            <h2>Hotels in <?php echo $searched_city?></h2>
                        </div>
                        <div class="mt-5">
                            <div class="container">
                                <div>
                                    <div class="row1" data-masonry="{&quot;percentPosition&quot;: true }">


                                        <?php

                                        if (!empty($searched_city)) {

                                            foreach ($searched_hotels as $result) {

                                                $db_hotel_img =  explode(",", $result['uploaded_image']);

                                                ?>

                                                <!-- repeating black -->

                                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4"
                                                     style="padding: 5px;">
                                                    <div class="card"
                                                         style="background: rgb(33,37,41); border-style: none; box-shadow: 0px 0px 15px 3px #ffffff08;">
                                                        <picture type=""><img class="card-img-top p-3"
                                                                              src="../upload/<?php echo trim($db_hotel_img[0]); ?>"
                                                                              style="border-radius: 24px; "
                                                                              width="100%" height="286"></picture>
                                                        <div class="card-body"
                                                             style="padding-top: 0px; padding-bottom: 16px; text-align: center;">
                                                            <h5 class="card-title"
                                                                style="margin-bottom: 0px; color: rgb(255,255,255);">

                                                                <?php echo $result['hotel_name']; ?>


                                                            </h5>
                                                            <p class="card-text"
                                                               style="margin-bottom: 0px; color: rgb(108, 117, 125);">
                                                                <?php echo $result['city']; ?>
                                                            </p>
                                                            <div class="btn-group" role="group"
                                                                 style="padding-top: 6px; border-style: none;">
                                                                <button class="btn btn-primary btn-d d-flex align-items-center"
                                                                        type="button"
                                                                        data-bs-toggle="modal" <?php echo "data-bs-target=#" . $result['hotel_id']; ?>
                                                                        style="border-radius: 56px; width: 100%; font-size: 15px; margin-right: 10px;">
                                                                    <strong>More details</strong>&nbsp;<i
                                                                            class="fa fa-bars"
                                                                            style="margin-left: 5px;"></i>
                                                                </button>


                                                                <button class="btn btn-primary btn-d d-flex align-items-center"
                                                                        type="button"
                                                                        data-bs-toggle="modal" <?php echo "data-bs-target=#" ."booking_".$result['hotel_id'] ; ?>
                                                                        style="border-radius: 56px; width: 100%; font-size: 15px; margin-right: 10px;">
                                                                    <strong>Book Now</strong>&nbsp;<svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 -64 640 640" width="1em"
                                                                            height="1em" fill="currentColor"
                                                                            style="margin-left: 5px;">
                                                                        <path
                                                                                d="M115.4 136.8l102.1 37.35c35.13-81.62 86.25-144.4 139-173.7c-95.88-4.875-188.8 36.96-248.5 111.7C101.2 120.6 105.2 133.2 115.4 136.8zM247.6 185l238.5 86.87c35.75-121.4 18.62-231.6-42.63-253.9c-7.375-2.625-15.12-4.062-23.12-4.062C362.4 13.88 292.1 83.13 247.6 185zM521.5 60.51c6.25 16.25 10.75 34.62 13.13 55.25c5.75 49.87-1.376 108.1-18.88 166.9l102.6 37.37c10.13 3.75 21.25-3.375 21.5-14.12C642.3 210.1 598 118.4 521.5 60.51zM528 448h-207l65-178.5l-60.13-21.87l-72.88 200.4H48C21.49 448 0 469.5 0 496C0 504.8 7.163 512 16 512h544c8.837 0 16-7.163 16-15.1C576 469.5 554.5 448 528 448z">
                                                                        </path>
                                                                    </svg>
                                                                </button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Hotel Details Modal -->
                                                <div class="modal fade custom-modal" id=<?php echo $result['hotel_id']; ?> tabindex="-1" aria-labelledby="hotelModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hotelModalLabel">Hotel Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                                                                            <div class="carousel-inner">
                                                                                <?php
                                                                                foreach ($db_hotel_img as $index => $image) {
                                                                                    $active = $index === 0 ? 'active' : ''; // Set the 'active' class for the first image

                                                                                    echo '<div class="carousel-item ' . $active . '">';
                                                                                    echo '<img src="../upload/' . trim($image) . '" class="d-block w-100" alt="Image ' . ($index + 1) . '">';
                                                                                    echo '</div>';
                                                                                }
                                                                                ?>


                                                                            </div>
                                                                            <a class="carousel-control-prev" href="#imageSlider" role="button" data-bs-slide="prev">
                                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                <span class="visually-hidden">Previous</span>
                                                                            </a>
                                                                            <a class="carousel-control-next" href="#imageSlider" role="button" data-bs-slide="next">
                                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                <span class="visually-hidden">Next</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" style="overflow-wrap: break-word;">
                                                                        <h4><?php echo $result['hotel_name']; ?></h4>

                                                                        <p><strong>City:</strong> <?php echo $result['city']; ?></p>
                                                                        <p><strong>Address:</strong> <?php echo $result['address']; ?></p>
                                                                        <p><strong>Description:</strong> <?php echo $result['description']; ?></p>

                                                                        <p><strong>Email:</strong> <?php echo $result['contact_email']; ?></p>
                                                                        <p><strong>Contact Number:</strong> <?php echo $result['contact_phone']; ?></p>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>

                                                                <?php
                                                                $hotels_room_det = $hotel->showHotelRooms(6);
                                                                ?>
                                                                <h4>Hotel Rooms Details</h4>
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Room Type</th>
                                                                        <th>Price Per Night (Rs.)</th>
                                                                        <th>Max People Allowed</th>
                                                                        <th>Amenities</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                    foreach ($hotels_room_det as $row) {
                                                                        echo '<tr>';
                                                                        echo '<td>' . $row['room_type'] . '</td>';
                                                                        echo '<td>' . $row['price_per_night'] . '</td>';
                                                                        echo '<td>' . $row['max_people_allowed'] . '</td>';
                                                                        echo '<td>' . $row['amenities'] . '</td>';
                                                                        echo '</tr>';
                                                                    }
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <!-- start reviw and ratings -->
                                                            <?php
                                                            
                                                            
                                                            $feedback = new Feedback();
                                                            $feedback->setHotelId($result['hotel_id']);
                                                            $ReviwCount = $feedback->getCountReviws($result['hotel_id']);
                                                            $fiveStarCount = $feedback->getCountFiveStar($result['hotel_id']);
                                                            $fiveStarRow = $feedback->fiveStarRaw($ReviwCount,$fiveStarCount);
                                                            $fourStarCount = $feedback->getCountFourStar($result['hotel_id']);
                                                            $fourStarRow = $feedback->fourStarRaw($ReviwCount,$fourStarCount);
                                                            $threeStarCount = $feedback->getCountThreeStar($result['hotel_id']);
                                                            $threeStarRow = $feedback->fourStarRaw($ReviwCount,$threeStarCount);
                                                            $twoStarCount = $feedback->getCountTwoStar($result['hotel_id']);
                                                            $twoStarRow = $feedback->fourStarRaw($ReviwCount,$twoStarCount);
                                                            $oneStarCount = $feedback->getCountOneStar($result['hotel_id']);
                                                            $oneStarRow = $feedback->fourStarRaw($ReviwCount,$oneStarCount);
                                                            $feedback->allStars($result['hotel_id']);
                                                            ?>
                                                            <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 course-details-content">
      <div class="course-details-card mt--40">
        <div class="course-content">
          <h5 class="mb--20">Review And Ratings</h5>
          <div class="row row--30">
            <div class="col-lg-4">
              <div class="rating-box">
                <div class="rating-number"><?php echo $feedback->ratings();?></div>
                <div class="rating"> 
                    <?php
                        if($feedback->ratings()==5){
                            
                            for($i=0;$i<5;$i++){
                            ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php
                        }
                    }else if($feedback->ratings()>=4){
                            for($i=0;$i<4;$i++){
                                ?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                <?php
                            }for($j=0;$j<1;$j++){
                            ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                        
                        }
                        }else if($feedback->ratings()>=3){
                            for($i=0;$i<3;$i++){
                                ?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                <?php
                            }for($j=0;$j<2;$j++){
                            ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                        
                        }
                        }else if($feedback->ratings()>=2){
                            for($i=0;$i<2;$i++){
                                ?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                <?php
                            }for($j=0;$j<3;$j++){
                            ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                        
                        }
                        }
                        else if($feedback->ratings()>=1){
                            for($i=0;$i<1;$i++){
                                ?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                <?php
                            }for($j=0;$j<4;$j++){
                            ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                        
                        }
                        }else{
                            for($j=0;$j<5;$j++){
                                ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                            
                            }
                        }
                    ?>
                    
                </div>
                <span><?php echo $ReviwCount; ?></span> </div>
            </div>
            <div class="col-lg-8">
              <div class="review-wrapper">
                <div class="single-progress-bar">
                  <div class="rating-text"> 5 <i class="fa fa-star" aria-hidden="true"></i> </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width:<?php echo $fiveStarRow;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="rating-value"><?php echo $fiveStarCount;?></span> </div>
                <div class="single-progress-bar">
                  <div class="rating-text"> 4 <i class="fa fa-star" aria-hidden="true"></i> </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $fourStarRow;?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="rating-value"><?php echo $fourStarCount;?></span> </div>
                <div class="single-progress-bar">
                  <div class="rating-text"> 3 <i class="fa fa-star" aria-hidden="true"></i> </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $threeStarRow;?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="rating-value"><?php echo $threeStarCount;?></span> </div>
                <div class="single-progress-bar">
                  <div class="rating-text"> 2 <i class="fa fa-star" aria-hidden="true"></i> </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $twoStarRow;?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="rating-value"><?php echo $twoStarCount;?></span> </div>
                <div class="single-progress-bar">
                  <div class="rating-text"> 1 <i class="fa fa-star" aria-hidden="true"></i> </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $oneStarRow;?>%" aria-valuenow="0" aria-valuemin="80" aria-valuemax="100"></div>
                  </div>
                  <span class="rating-value"><?php echo $oneStarCount;?></span> </div>
              </div>
            </div>
          </div>
          <div class="comment-wrapper pt--40">
            <div class="section-title">
              <h5 class="mb--25">Reviews</h5>
            </div>
            
            <?php
                $rs = $feedback->reviwDetails($result['hotel_id']);
                foreach($rs as $result){
            ?>
			  <!--  Comment Box start--->

            <div class="edu-comment">
              <div class="thumbnail"> 

              <?php 
                                                    if ($result["profilePic"] != null) {
                                                        ?>
                                                        <div class="image-cropper">
                <img src="../userProPic/<?php echo $result["profilePic"]; ?>" alt="Comment Images"> 
                </div>
                <?php
                                                    } else {
                                                        ?>
                                                        <div class="image-cropper">
                                                        <img src="../assets/img/n.png" id="output" width="200" />
                                                        </div>
                                                    <?php }?>
            </div>
              <div class="comment-content">
                <div class="comment-top">
                  
                  <div class="rating"> 
                    <?php
                    if($result["user_rating"]==5){
                        for($i=0;$i<5;$i++){
                            ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php
                        }}else if($result["user_rating"]==4){
                    ?>
                    <?php
                    
                        for($i=0;$i<4;$i++){
                            ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php
                        }for($j=0;$j<1;$j++){
                        ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                    
                    }}else if($result["user_rating"]==3){
                    ?>
                    <?php
                    
                    for($i=0;$i<3;$i++){
                        ?>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        <?php
                    }for($j=0;$j<2;$j++){
                        ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                    
                    }
                }else if($result["user_rating"]==2){
                ?>
                <?php
                    
                    for($i=0;$i<2;$i++){
                        ?>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        <?php
                    }for($j=0;$j<3;$j++){
                        ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                    
                    }
                }else if($result["user_rating"]==1){
                ?>
                <?php
                    
                    for($i=0;$i<1;$i++){
                        ?>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        <?php
                    }
                    for($j=0;$j<4;$j++){
                        ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                    
                    }}else{
                ?><?php
                    
                
                for($j=0;$j<5;$j++){
                    ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffa41b}</style><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg><?php
                
                }}
            ?>
                    
                    
                    
                </div>
                </div>
                <h6 class="title"><?php echo $result["userFirstName"]; ?> <?php echo $result["userLastName"]; ?></h6>
                <p><?php echo $result["user_review"]; ?></p>
              </div>
            </div>
			  <!-- Comment Box end--->
			  <?php
                                                    }
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- review and ratings end -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                
                                                           
                                                                
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
                                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Booking modal-->

                                                <div class="modal fade custom-modal" id=<?php echo "booking_".$result['hotel_id']; ?> tabindex="-1" aria-labelledby="hotelModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">

                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div>
                                                                    <form method="POST" action="../process/bookingProcess.php">
                                                                                <div class="mb-3">
                                                                                    <label for="bookingHotelName" class="form-label">Hotel
                                                                                        Name</label>
                                                                                    <input type="text" name="hname" class="form-control"
                                                                                           id="bookingHotelName" value="<?php echo $result['hotel_name']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="bookingCheckIn" class="form-label">Check-in
                                                                                        Date</label>
                                                                                    <input type="date" class="form-control"
                                                                                           id="bookingCheckIn" name="date" required min="<?php echo date("Y-m-d"); ?>">
                                                                                </div>
                                                                                <div class="mb-3">

                                                                                    <label for="roomSelect">Select a Room:</label>
                                                                                    <select id="roomSelect" name="roomSelect" class="form-select" onchange="showDropInfo()">
                                                                                        <option value="" selected disabled>Select a room</option>
        <?php
        foreach ($hotels_room_det as $row) {
            echo '<option value="' . $row['price_per_night'] . '">' . $row['room_type'] . " -  Price per night - LKR " . $row['price_per_night'] . '</option>';
        }
        ?>
                                                                                    </select>
                                                                                </div>


                                                                                <div class="mb-3">
                                                                                    <label for="bookingHotelName" class="form-label">Number of Nights</label>
                                                                                    <input type="number" class="form-control" min="1" max="5"
                                                                                           id="nights" value="" name="nights" onkeyup="" >
                                                                                </div>
                                                                                <div class="mb-3">

                                                                                    <label for="bookingHotelprice" class="form-label">Full Price (LKR)</label>
                                                                                    <input type="text" class="form-control" id="nightprice" name="fullprice" value="" />

                                                                                </div>

                                                                                
                                                                                <!-- <input type="hidden" name="userid" value="" /> -->
                                                                                
                                                                                <input type="hidden" name="hotelid" value="<?php echo $result['hotel_id']; ?>" />
                                                                                <input type="hidden" name="hotelname" value="<?php echo $result['hotel_name']; ?>" />
                                                                                <div class="mb-3 text-end">
                                                                                    <button type="button" class="btn btn-secondary me-2"
                                                                                            data-bs-dismiss="modal">Close
                                                                                    </button>
                                                                                    <button type="submit"  class ="btn btn-primary">Submit
                                                                                        Booking
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div>


                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>





                                                <?php
                                            }
                                        } else {
                                            echo "No hotels found for the given location.";
                                        }
                                        ?>


                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


                


            </div>
        </main>
    </section>
</div>

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-xxl-3 footer-navigation col-sm-4">
            <h3><img src="assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png" width="149"
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../js/jquery-3.5.0.min.js"></script>
        <script src="../js/script.js"></script>
    <script src="https://kit.fontawesome.com/415a9991c1.js" crossorigin="anonymous"></script>
</body>

</html>