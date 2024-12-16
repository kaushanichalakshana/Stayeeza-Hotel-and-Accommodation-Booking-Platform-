<?php

require '../Classes/Admin.php';
use Classes\Admin;
require '../Classes/Booking.php';

use Classes\Booking;
$booking = new Booking();
$booking->deletePayment();

?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    
    <link rel="stylesheet" href="../assets/css/styles-admin.css">
    <link rel="stylesheet" href="../assets/css/styles-home.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body><nav class="navbar navbar-expand-md py-3 navbar-light"
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
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="search_hotel.php">Hotels</a></li>
                <?php if(isset($_SESSION['email'])){
            
            ?>
                    <?php if ($_SESSION['isowner']) {
                        ?>
                    <li class="nav-item"><a class="nav-link hide" href="search_hotel.php">Add Hotel</a></li>     
                      <?php
        } ?>
                    
                    <?php if ($_SESSION['isadmin']) {
                        ?>
                    <li class="nav-item"><a class="nav-link hide active" href="adminpanel-user.php">Admin Panel</a></li>   
                    <?php
        }
                    }else{
                        header("Location:../index.php");
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
                    }else{
                        ?>
                <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="userprofile.php"><i class="fas fa-light fa-user"></i><?php echo $_SESSION["username"]; ?></a>
                <a class="btn btn-primary me-3" role="button" data-bss-hover-animate="pulse" href="../process/logout.php">LOG OUT</a>
                <?php
                    }
                }
            
            ?></div>
    </div>
</nav>
    <br>
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper" style="background: #2d2f3e;">
            <div id="content" style="color: #2D2F3E;">
                <div class="container-fluid" style="margin-bottom: 50px;">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <h3 class="text-white mb-4">Admin Dashboard</h3>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 text-end" style="margin-bottom: 30px;"><a href="adminpanel-owner.php"
                                class="btn btn-primary" role="button"><i class="fa fa-plus"></i>&nbsp;View Hotel Owners </a></div>
                    </div>
                    <div class="card" id="TableSorterCard" style="border-style: none;border-radius: 6.5px;">
                        <div class="card-header py-3" style="border-width: 0px;background: rgb(23,25,33);">
                            <div class="row table-topper align-items-center">
                                <div class="col-12 col-sm-5 col-md-6 text-start" style="margin: 0px;padding: 5px 15px;">
                                    <p class="m-0 fw-bold" style="color: rgb(255,255,255);"></p>
                                </div>
                                <div class="col-12 col-sm-5 col-md-6 text-start" style="margin: 0px;padding: 5px 15px;">
                                    <input type="text" class="form-control1 ps-4 pe-4 rounded-pill col-10" name="search"
                                        placeholder="Search..."><button class="btn btn-primary ps-4 pe-4 rounded-pill"
                                        type="submit"><i class="fa fa-search"></i></button></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive" style="border-top-style: none;background: #171921;">
                                    <table class="table table-striped table tablesorter" id="ipi-table">
                                        <thead class="thead-dark"
                                            style="background: rgb(33,37,48);border-width: 0px;border-color: rgb(0,0,0);border-bottom-color: #21252F;">
                                            <tr
                                                style="border-style: none;border-color: rgba(255,255,255,0);background: #21252f;">
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Verify</th>
                                                <th class="text-center filter-false sorter-false">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center" style="border-top-width: 0px;">
                                        <?php
                                            $user = new Admin();
                                            $rs=$user->loadusers();
                                            foreach ($rs as $users){
                                            
                                        ?>
                                        
                                            <tr style="background: #262a38;">
                                                <td style="color: rgb(0,0,0);"><?php echo $users["userId"]; ?></td>
                                                <td style="color: rgb(0,0,0);"><?php echo $users["userEmail"]; ?></td>
                                                <td style="color: rgb(0,0,0);">Yes</td>
                                                <td class="text-center align-middle"
                                                    style="max-height: 60px;height: 60px;"><a class="btn btnMaterial btn-flat primary semicircle" role="button" href="user.php?viewUser=<?php echo $users["userId"]; ?>" style="color: #00bdff;"><i class="far fa-eye"></i></a>
                                                   <a  class="btn btnMaterial btn-flat primary semicircle" role="button" href="adminpanel-user.php?delete=<?php echo $users["userId"]; ?>" style="color: #DC3545;"><i class="fas fa-trash btnNoBorders"></i></a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php

    

$booking = new Admin();
$rs = $booking->paymentView();
if($rs!=null){

?>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="position-relative card1 table-nowrap table-card1">
                    <div class="card1-header align-items-center">
                        <h5 class="mb-0" style="color: white">Booking History</h5>
                        <p class="mb-0 small text-muted"></p>
                    </div><br>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>User ID</th>
                                    <th>Invoice No</th>
                                    <th>Booking ID</th>
                                    <th>Hotel ID</th>
                                    <th>Hotel Name</th>
                                    <th>Room Type</th>
                                    <th>Payment Date</th>
                                    <th>Booking Date</th>
                                    
                                    <th>Amount(LKR)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rs as $results){ 
                                    if($results["status"]=="Incomplete"){
                                        continue;
                                    }?>
                                <tr class="align-middle">
                                    <td><?php echo $results["userId"];?></td>
                                    <td>
                                        <?php echo $results["invoiceNo"];?>
                                    </td>
                                    <td><?php echo $results["bookingId"];?></td>
                                    <td><?php echo $results["hotelId"];?></td>
                                    <td><?php echo $results["hotelName"];?></td>
                                    <td><?php echo $results["roomType"];?></td>
                                    <td><?php echo $results["paymentDate"];?></td>
                                    <td><?php echo $results["bookingDate"];?></td>
                                    
                                    <td>
                                        <div class="d-flex align-items-center">
                                            
                                            <span><?php echo $results["hotelCharges"];?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge fs-6 fw-normal bg-tint-success text-success"><?php echo $results["status"];?></span>
                                    </td>
                                </tr>
                               <?php }?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<?php
}?>
            <?php
            
                if (isset($_GET['delete'])) {

                    $id = $_GET['delete'];
                        ?>
                
                        <script>
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                               <?php
                                $deleteuser = new Admin();
                                $deleteuser->deleteuser($id);
                               ?>
                                window.location.href="adminpanel-user.php?success=1";
                            }
                        })
                    
                </script>
                        <?php
                    
                }
                ?>
                <?php
                if (isset($_GET['success'])) {

                    if ($_GET['success'] == 1) {
                        ?>
                        
                        <script>
                                swal("Successfully!", "User Profile Deleted!", "success");
                        </script>
                        <?php
                    }
                }
                ?>
            
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"></a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/415a9991c1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/js/script.min.js"></script>
</body>

</html>