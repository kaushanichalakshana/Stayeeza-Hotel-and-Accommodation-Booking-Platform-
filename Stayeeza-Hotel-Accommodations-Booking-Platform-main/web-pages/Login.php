<?php
session_start();
setcookie("email", "", time() - (3600), "/");
setcookie("username", "", time() - (3600), "/");
setcookie("fname", "", time() - (3600), "/");
setcookie("userId", "", time() - (3600), "/");
setcookie("orderId", "", time() - (86400 * 30), "/");
setcookie("hotelname", "", time() - (86400 * 30), "/");
setcookie("bookingId", "", time() - (86400 * 30), "/");
setcookie("hotelId", "", time() - (86400 * 30), "/");
session_unset();

session_destroy();
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en" style="color: rgb(255,255,255);">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Login Stayeeza</title>
        <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/styles.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    </head>

    <body style="background: url(&quot;../assets/img/login-back.jpg&quot;);background-size: cover;">
        <div class="container title" style="font-size: 17px;">
            <div class="row2 mt-5">
                <br><br>
                <section>
                    <div class="section-bg-overlay">
                        <div class="form-box">
                            <div class="form-value">
                                <form class="fcolor" action="../process/loginProcess.php" method="POST">
                                    <div><a href="index.php" style="text-decoration: none;"><img class="mt-2" src="../assets/img/apple-touch-icon.png" style="border-radius: 50%;"
                                              width="143" height="137"></a>
                                        <h1
                                            style="font-weight: bold;font-family: Alatsi, sans-serif;color: rgb(255,255,255);">
                                            Welcome Back</h1>
                                        <h1
                                            style="font-family: Alatsi, sans-serif;font-weight: bold;color: rgb(255,255,255);">
                                            Stayeeza</h1>
                                    </div>
                                    <div class="fcolor inputbox"><input type="email" required="" name="email"><label class="form-label"
                                                                                                                     for="">Email</label></div>
                                    <div class="inputbox"><input type="password" name="password" required=""><label class="form-label"
                                                                                                                    for="">Password</label></div>
                                    <button class="button-log">Login</button>
                                    <div class="register">
                                        <p><a href="registration.php" style="text-decoration: none">- If you haven't account Register Now -</a></p>
                                        <p><a href="forgotPassword.php" style="text-decoration: none">Forget Password? </a></p>
                                    </div>
                                </form>
                                <?php
                                if (isset($_GET['success'])) {

                                    if ($_GET['success'] == 1) {
                                        ?>

                                        <script>
                                            swal.fire("Successfully!", "Change the Password", "success");
                                        </script>
                                        <?php
                                    } if ($_GET['success'] == 2) {
                                        ?>

                                        <script>
                                            swal.fire("Successfully!", "Created the account!", "success");
                                        </script>
                                        <?php
                                    } if ($_GET['success'] == 3) {
                                        ?>

                                        <script>
                                            Swal.fire('Check your email inbox!')
                                        </script>
                                        <?php
                                    }
                                }
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 1) {
                                        ?>

                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'Your Email or Password Incorrect!',
                                                
                                            })
                                        </script>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>