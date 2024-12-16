<?php
require '../Classes/Payment.php';

use Classes\Paayment;

if (!isset($_COOKIE["bookingId"])) {
    header("Location:../index.php");
} else {
    $bookingId = $_COOKIE["bookingId"];
    $hotelname = $_COOKIE["hotelname"];
    $booking = new Paayment($bookingId, null, null, null, null, null, null,null);
    $rs = $booking->loadBooking($bookingId);
    foreach ($rs as $results) {
        ?>


        <!DOCTYPE html>
        <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

                <title>Stayeeza Booking Confirm</title>
                <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
                <!-- Google font -->
                <link href="https://fonts.googleapis.com/css?family=Medula+One" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

                <!-- Bootstrap -->
                <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />

                <!-- Custom stlylesheet -->
                <link type="text/css" rel="stylesheet" href="../css/style.css" />

                

            </head>

            <body>
                <div id="booking" class="section">
                    <div class="section-center">
                        <div class="container">
                            <div class="row">
                                <div class="booking-form">
                                    <div class="form-header">
                                        <h2>Confirm Your Booking</h2>
                                        <p><?php echo $hotelname; ?></p>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="form-label">Arrival date</span>
                                                    <input class="form-control" type="date" readonly="" value="<?php echo $results["bookingDate"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="form-label">Full Price(LKR)</span>
                                                    <input class="form-control" type="text" readonly="" value="<?php echo $results["bookingPrice"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="form-label">Room Type</span>
                                                    <input class="form-control" type="text" readonly="" value="<?php echo $results["roomType"]; ?>">
                                                    <span class="select-arrow"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span class="form-label">Nights</span>
                                                    <input class="form-control" type="text" readonly="" value="<?php echo $results["numOfNights"]; ?>">
                                                    <span class="select-arrow"></span>
                                                </div>
                                            </div>
                                        </div>
                                          <?php
    }
}?></form>
                                    <div class="form-btn" style="padding: 30px;margin-top: -10px">
                                            <button class="submit-btn" onclick="step();">Confirm</button>
                                        </div>
                                    <!-- <div class="btnnew d-block form-btn" style="padding: 30px;margin-top: -10px">
                                            <a href="../index.php" class="submit-btn" style="text-decoration: none;justify-content: center">Home</a>
                                        </div> -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
            <script src="../js/payhere.js"></script>
            <script>
                function step(){
                    paymentGateway();
                    
                }

            </script>
        </html>
  