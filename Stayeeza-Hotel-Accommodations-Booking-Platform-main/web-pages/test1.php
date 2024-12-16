<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        
        
        <h4 id="name">Iphone 14 Pro Max</h4>
        <p>Rs.<span >100</span>.00</p>
        <input type="text" id="price" name="price" value="1400" />
                <button class="btn btn-warning" onclick="paymentGateway();">Buy Now</button>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="script.js"></script>
        
    </body>
</html>
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
        <script src="../js/jquery-3.5.0.min.js"></script>
        <script>
        $(document).ready(function(){
    	// Get value on keyup funtion
    	$("#roomSelect, #nights").keyup(function(){

    	var total=0;    	
    	var x = Number($("#roomSelect").val());
    	var y = Number($("#nights").val());
    	var total=x * y;  

    	$('#nightprice').val(total);

    });
});</script>
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
            <a class="navbar-brand d-flex align-items-center" href="../index.php">
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

<?php if (isset($_SESSION['email'])) {
    ?>
                        <?php if ($_SESSION['isowner']) {
                            ?>
                            <li class="nav-item"><a class="nav-link hide" href="addhotel.php">Dashboard</a></li>
                            <?php }
                        ?>

                        <?php if ($_SESSION['isadmin']) {
                            ?>
                            <li class="nav-item"><a class="nav-link hide" href="adminpanel-user.php">Admin Panel</a></li>
                            <?php
                        }
                    }
                    ?>

                </ul>

<?php if (!isset($_SESSION['email'])) {
    ?>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="login.php">LOG IN</a>
                    <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="registration.php">REGISTER</a>

                <?php
                } else {
                    if ($_SESSION['isadmin']) {
                        ?>

                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="adminpanel-user.php">Admin <?php echo $_SESSION["username"]; ?></a>
                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="../process/logout.php">LOG OUT</a>
        <?php
    } elseif ($_SESSION['isowner']) {
        ?>
                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="userprofile.php?owner=<?php echo $_SESSION["userid"]; ?>"><i class="fas fa-light fa-user"></i> <?php echo $_SESSION["username"]; ?></a>
                        <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="../process/logout.php">LOG OUT</a>
                        <?php
                    } else {
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
                            
                                <div class="input-group mb-3 mx-auto" style="width: 80%;">

                                    <form method="post" action="../process/show_hotel.php">
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
                            
                            <br>
                            <div class="search-results">
                                <h2>Hotels in <?php echo $searched_city ?></h2>
                            </div>
                            <div class="mt-5">
                                <div class="container">
                                    <div>
                                        <div class="row1" data-masonry="{&quot;percentPosition&quot;: true }">


<?php
if (!empty($searched_city)) {

    foreach ($searched_hotels as $result) {

        $db_hotel_img = explode(",", $result['uploaded_image']);
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
                                                                            data-bs-toggle="modal" <?php echo "data-bs-target=#" . "booking_" . $result['hotel_id']; ?>
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
                                                                                <th>Price Per Night (LKR)</th>
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
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-toggle="modal" <?php echo "data-bs-target=#" . "booking_" . $result['hotel_id']; ?>>Book Now</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Booking modal-->

                                                    <div class="modal fade custom-modal" id=<?php echo "booking_" . $result['hotel_id']; ?> tabindex="-1" aria-labelledby="hotelModalLabel" aria-hidden="true">
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


                                                                                <input type="hidden" name="userid" value="<?php echo $_COOKIE["userId"]; ?>" />
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


                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link"><i class="

                                                        fa fa-arrow-left"></i> Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next <i class="fa fa-arrow-right"></i></a>
                            </li>
                        </ul>
                    </nav>


                </div>
            </main>
        </section>
    </div>

    <!-- Footer -->
    <footer>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js "></script>
    <script src="../js/script.js"></script>
    <script src="https://kit.fontawesome.com/415a9991c1.js" crossorigin="anonymous"></script>
</body>

</html>