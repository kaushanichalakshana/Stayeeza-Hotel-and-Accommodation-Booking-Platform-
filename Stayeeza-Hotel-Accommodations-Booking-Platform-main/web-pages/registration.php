<!DOCTYPE html>
<html data-bs-theme="light" lang="en" style="margin-top: -101px;padding-top: 21px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RegistrationForm-Stayeeza</title>
    <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/styles-reg.css">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
</head>

<body style="background: url(&quot;../assets/img/back-reg.jpg&quot;);background-size: cover;">
    <section class="clean-block clean-form dark h-100" style="padding-top: 0px;background: transparent;">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="fs-1 text-light"
                    style="font-size: 26.52px;font-family: Alatsi, sans-serif;font-weight: bold;text-align: center;padding-bottom: 0px;margin-bottom: 19px;margin-top: 122px;">
                    <img src="../assets/img/apple-touch-icon.png" style="border-radius: 50%;" width="87" height="84">&nbsp;
                    Registration Form Stayeeza</h2>
                <p></p>
            </div>
            <form action="../process/register.php" method="post" enctype="multipart/form-data" role="form"
                style="background: #221717b0;border-style: none;border-color: var(--bs-primary-bg-subtle);">
                <div class="form-group mb-3"><label class="form-label fw-bold text-light">First Name</label><input
                        class="form-control" type="text" placeholder="Full Name" name="fname" required=""></div>
                        
                <div class="form-group mb-3"><label class="form-label fw-bold text-light">Last Name</label><input
                        class="form-control" type="text" placeholder="Last Name" name="lname" required=""></div>
                        
                <div class="form-group mb-3"><label class="form-label fw-bold text-light">Contact Number</label><input
                        class="form-control" type="text" placeholder="94771234567" name="cNumber" required=""></div>
                        
                <div class="form-group mb-3"><label class="form-label fw-bold text-light">Email</label><input
                        class="form-control" type="text" placeholder="Email" name="email" required=""></div>
                        
                        <div class="form-group mb-3"><label class="form-label fw-bold text-light">Password</label> <label class="form-label  text-light" style="font-size: 11px"> (Must be 8 to 16 characters long)</label><input
                        class="form-control" type="password" id="formum2" placeholder="Password" name="pass"></div>
                        <div class="form-group mb-3"><label class="form-label fw-bold text-light">Confirm Password</label><input
                        class="form-control" type="password" id="formum2" placeholder="Confirm Password" name="pass2"></div>
                        
                        <label
                    class="form-label fw-bold text-light" style="padding-right: 22px;">Gender</label><button
                    class="btn btn-dark btn-sm" type="button" style="background: var(--bs-primary);">Male<input type="radio" name="gender"
                                                                                                                value="Male" style="width: 30px;"></button>
                <div class="btn-group" role="group"></div><button class="btn btn-dark btn-sm" type="button"
                                                                  style="background: var(--bs-primary);">Female<input type="radio" name="gender" value="Female"
                         style="width: 30px;"></button>
                <hr style="margin-top: 30px;margin-bottom: 10px;"><label class="form-label btn btn-secondary"
                                                                         style="width: 199.288px;padding: 8px 12px;">Business Account<input type="radio" name="account" value="Business"
                         style="width: 30px;"></label><label class="form-label btn btn-secondary"
                               style="margin-left: 14px;width: 200.925px;height: 41px;">Personal Account<input type="radio" value="Personal"
                        name="account"  style="width: 33px;"></label><button
                    class="btn btn-primary d-block w-100" type="submit"
                    style="color: var(--bs-btn-hover-color);margin-right: -27px;padding-right: 44px;padding-bottom: 4px;margin-bottom: 6px;width: 400px;height: 50px;border-color: var(--bs-body-bg);margin-top: 12px;"><i
                        class="fas fa-save"></i>&nbsp;REGISTER</button>
            </form>
             <?php
                                   
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 1) {
                                        ?>

                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'You should fill this form!',
                                                
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
                                                text: 'You should fill this form!',
                                                
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
                                    if ($_GET['error'] == 6) {
                                        ?>

                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'You entered passwords not match!',
                                                
                                            })
                                        </script>
                                        <?php
                                    }
                                    if ($_GET['error'] == 7) {
                                        ?>

                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'Your password must be 8 to 16 characters long!',
                                                
                                            })
                                        </script>
                                        <?php
                                    }
                                }
                                ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
</body>

</html>