<?php
require '../Classes/Admin.php';

use Classes\Admin;

session_start();


if (!isset($_SESSION['email'])) {

    header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>User Profile</title>
        <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/styles-user.css">
        <link rel="stylesheet" href="../assets/css/styles-home.css">
        <link rel="stylesheet" href="../assets/css/style-propic.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-md py-3 navbar-light"
             style="background: #343a40;margin-top: -6px;padding-bottom: 22px;margin-bottom: -3px;padding-top: 5px;height: 86px;">
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="../index.php"><img
                        src="../assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png" width="65"
                        height="58" style="padding-left: 0px;"></a><button data-bs-toggle="collapse" class="navbar-toggler"
                                                                   data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1"
                     style="color: rgb(240,245,251);font-family: Montserrat, sans-serif;margin: -2px;margin-left: 12px;background: #343a40;padding: 12px;">
                         <?php ?>
                    <ul class="navbar-nav me-auto nav-clr">
                        <li class="nav-item"><a class="nav-link  nav-link" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link " href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="search_hotel.php">Hotels</a></li>

                        <?php if (isset($_SESSION['email'])) {
                            ?>
                            <?php if ($_SESSION['isowner']) {
                                ?>
                                <li class="nav-item"><a class="nav-link hide" href="HOTEL ADD DETAILS.php">Add Hotel</a></li>     
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
        </nav><br>
        <?php
        if (isset($_GET["user"])) {
            $id = $_GET["user"];

            $user = new Admin();
            $rs = $user->viewUser($id);
            foreach ($rs as $users) {
                ?>
                <form action="../process/editaccount.php" method="POST" enctype="multipart/form-data"> 
                    <div class="container">
                        <h1>USER PROFILE</h1>
                        <div class="main-body" style="background: #343a40;">
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center d-flex flex-column align-items-center mt-4">
                                                <div class="profile-pic"> 
                                                    <label class="-label" for="file">
                                                        <span class="glyphicon glyphicon-camera"></span>
                                                        <span>Change Image</span>
                                                    </label>
                                                    <input id="file" type="file" name="propic" accept=".png, .jpg, .jpeg" onchange="loadFile(event)"/>
                                                    <?php
                                                    if ($users["profilePic"] != null) {
                                                        ?>
                                                        <img src="../userProPic/<?php echo $users["profilePic"]; ?>" id="output" width="200" />
                                                        <input type="hidden" name="propic" value="<?php echo $users["profilePic"]; ?>" />
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="../assets/img/n.png" id="output" width="200" />
                                                    <?php }
                                                    ?>
                                                </div><br>
                                                <h4><?php echo $users["userFirstName"]; ?> <?php echo $users["userLastName"]; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">First Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary"><span> <input style="border: none;" type="text" name="fname" value="<?php echo $users["userFirstName"]; ?>" />&nbsp;</span></div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Last Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary"><span><input class="col-12" style="border: none;" type="text" name="lname" value="<?php echo $users["userLastName"]; ?>" /></span></div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary"><span><input class="col-12" style="border: none;" type="text" name="email" value="<?php echo $users["userEmail"]; ?>" /></span></div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Phone</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary"><span><input class="col-12" style="border: none;" type="text" name="contact" value="<?php echo $users["userPhoneNo"]; ?>" /></span></div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6"><a class="btn btn-info col-3" role="button" 
                                                                         href="../index.php">Go Back</a></div>
                                                <div class="col-sm-6"><input type="submit" class="btn btn-info col-3" value="Save" />
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        }
    }
    ?>
    <?php
    if (isset($_GET["owner"])) {
        $id = $_GET["owner"];

        $user = new Admin();
        $rs = $user->viewHOwner($id);
        foreach ($rs as $users) {
            ?>
            <form action="../process/editaccount.php" method="POST" enctype="multipart/form-data">        
                <div class="container">
                    <h1>USER PROFILE</h1>
                    <div class="main-body" style="background: #343a40;">
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center d-flex flex-column align-items-center"><div class="profile-pic"> 
                                                <label class="-label" for="file">
                                                    <span class="glyphicon glyphicon-camera"></span>
                                                    <span>Change Image</span>
                                                </label>
                                                <input id="file" type="file" name="propic" accept=".png, .jpg, .jpeg" onchange="loadFile(event)"/>
                                                <?php
                                                if ($users["profilePic"]!=null ) {
                                                    ?>
                                                    <img src="../ownerProPic/<?php echo $users["profilePic"]; ?>" id="output" width="200" />
                                                    <input type="hidden" name="propic" value="<?php echo $users["profilePic"]; ?>" />
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="../assets/img/n.png" id="output" width="200" />
                                                <?php }
                                                ?>
                                            </div><br>
                                            <div class="mt-3">
                                                <h4><?php echo $users["ownerFirstName"]; ?> <?php echo $users["ownerLastName"]; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">First Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary"><span> <input  style="border: none;" type="text" name="fname" value="<?php echo $users["ownerFirstName"]; ?>" />&nbsp;</span></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Last Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary"><span><input class="col-12" style="border: none;" type="text" name="lname" value="<?php echo $users["ownerLastName"]; ?>" /></span></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary"><span><input class="col-12" style="border: none;" type="text" name="email" value="<?php echo $users["ownerEmail"]; ?>" /></span></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary"><span><input class="col-12" style="border: none;" type="text" name="contact" value="<?php echo $users["ownerPhoneNo"]; ?>" /></span></div>
                                        </div>
                                        <hr>




                                        <div class="row">
                                            <div class="col-sm-6"><a class="btn btn-info col-3" role="button" 
                                                                     href="../index.php">Go Back</a>
                                            </div>

                                            <div class="col-sm-6"><input type="submit" class="btn btn-info col-3" value="Save" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <?php
        }
    }
    require '../Classes/Payment.php';

    use Classes\Paayment;

$booking = new Paayment(null, null, null, null, null, null, null, null);
    $rs = $booking->paymentView($_COOKIE["userId"]);
    if ($rs != null) {
        ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-lg-5">
                    <div class="position-relative card1 table-nowrap table-card1">
                        <div class="card1-header align-items-center">
                            <h5 class="mb-0">Booking History</h5>
                            <p class="mb-0 small text-muted"></p>
                        </div><br>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="small text-uppercase bg-body text-muted">
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Date</th>
                                        <th>Hotel Name</th>
                                        <th>Room Type</th>
                                        <th>Amount(LKR)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach ($rs as $results) { ?>
                                        <tr class="align-middle">

                                            <td>
                                                <?php echo $results["invoiceNo"]; ?>
                                            </td>
                                            <td><?php echo $results["paymentDate"]; ?></td>
                                            <td><?php echo $results["hotelName"]; ?></td>
                                            <td><?php echo $results["roomType"]; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <span><?php echo $results["hotelCharges"]; ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                    if($results["status"]==="Incomplete"){
                                                ?>
                                                <span class="badge fs-6 fw-normal bg-tint-success text-danger"><?php echo $results["status"]; ?></span>
                                                <?php
                                                    } else {
                                                        ?>
                                                <span class="badge fs-6 fw-normal bg-tint-success text-success"><?php echo $results["status"]; ?></span>
                                                            <?php
                                                
                                            }?>
                                            </td>
                                        <?php } ?>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    $rs1 = $booking->hotelView($_COOKIE["userId"]);
    if($rs1!=null){
        ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-lg-5">
                    <div class="position-relative card1 table-nowrap table-card1">
                        <div class="card1-header align-items-center">
                            <h5 class="mb-0">Owned Hotels</h5>
                            <p class="mb-0 small text-muted"></p>
                        </div><br>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="small text-uppercase bg-body text-muted">
                                    <tr>
                                        <th>Hotel Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Description</th>
                                        <th>Contact Email</th>
                                        <th>Contact Phone</th>
                                    </tr>
                                </thead>
                                <tbody><?php foreach ($rs1 as $results1) { ?>
                                        <tr class="align-middle">

                                            <td>
                                                <?php echo $results1["hotel_name"]; ?>
                                            </td>
                                            <td><?php echo $results1["address"]; ?></td>
                                            <td><?php echo $results1["city"]; ?></td>
                                            <td><?php echo $results1["description"]; ?></td>
                                            <td>
                                                

                                                    <?php echo $results1["contact_email"]; ?>
                                                
                                            </td>
                                            <td>
                                            

<?php echo $results1["contact_phone"]; ?>

                                            </td>
                                        <?php } ?>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }


    if (isset($_GET['success'])) {

        if ($_GET['success'] == 1) {
            ?>

            <script>
                swal.fire("Successfully!", "Updated your profile", "success");
            </script>
            <?php
        }
    }
    ?>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
            ?>

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You cannot empty this fields!',

                })
            </script>
            <?php
        }
        if ($_GET['error'] == 2) {
            ?>

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You cannot empty this fields!',

                })
            </script>
            <?php
        }
        if ($_GET['error'] == 3) {
            ?>

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You entered First Name or Last Name Incorrect!',

                })
            </script>
            <?php
        }
        if ($_GET['error'] == 4) {
            ?>

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You entered Contact Number Not Valied!',

                })
            </script>
            <?php
        }
        if ($_GET['error'] == 5) {
            ?>

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You entered Email Not Valied!',

                })
            </script>
            <?php
        }
    }
    ?>
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
    <script src="https://kit.fontawesome.com/415a9991c1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/js/newScript.js"></script>
</body>

</html>