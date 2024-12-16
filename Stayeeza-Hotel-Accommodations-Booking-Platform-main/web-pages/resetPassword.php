

<!DOCTYPE html>
<html data-bs-theme="light" lang="en" style="color: rgb(255,255,255);">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Reset Password</title>
        <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/styles.min.css">
    </head>


    <body style="background: url(&quot;../assets/img/login-back.jpg&quot;);background-size: cover;">
        <div class="container title" style="font-size: 17px;">
            <div class="row2 mt-5">
                <section>
                    <div class="section-bg-overlay">
                        <div class="form-box">
                            <div class="form-value" style="padding-bottom: 10px;">
                                <?php
                            if (isset($_GET['userId'])) {

                    $id = $_GET['userId'];  
                        ?>
                                
                                <form class="fcolor" action="../process/reset.php" method="POST">
                                    <div><img class="mt-2" src="../assets/img/apple-touch-icon.png" style="border-radius: 50%;"
                                              width="150" height="150" >
                                        <h1
                                            style="font-weight: bold;font-family: Alatsi, sans-serif;color: rgb(255,255,255); padding-bottom: 1px;">
                                            Reset Password</h1>
                                        <h1
                                            style="font-family: Alatsi, sans-serif;font-weight: bold;color: rgb(255,255,255); ">
                                        </h1>
                                    </div>
                                    <div class="fcolor inputbox"><input name="pass1" type="password" required=""><label class="form-label"
                                                                                                           for="">Password*</label></div>
                                    <div class="fcolor inputbox"><input name="pass2" type="password" required=""><label class="form-label"
                                                                                                           for="">Confirm Password*</label></div>
                                    
                                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                                    <button class="button-log">Reset password</button>
                                    

                                </form>
                                <?php 
                            }elseif (isset($_GET['ownerId'])) {
                                $id = $_GET['ownerId']; 
                                ?>
                                    <form class="fcolor" action="../process/reset1.php" method="POST">
                                    <div><img class="mt-2" src="../assets/img/apple-touch-icon.png" style="border-radius: 50%;"
                                              width="150" height="150" >
                                        <h1
                                            style="font-weight: bold;font-family: Alatsi, sans-serif;color: rgb(255,255,255); padding-bottom: 1px;">
                                            Reset Password</h1>
                                        <h1
                                            style="font-family: Alatsi, sans-serif;font-weight: bold;color: rgb(255,255,255); ">
                                        </h1>
                                    </div>
                                    <div class="fcolor inputbox"><input name="pass1" type="password" required=""><label class="form-label"
                                                                                                           for="">Password*</label></div>
                                    <div class="fcolor inputbox"><input name="pass2" type="password" required=""><label class="form-label"
                                                                                                           for="">Confirm Password*</label></div>
                                    
                                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                                    <button class="button-log">Reset password</button>
                                    

                                </form>
                                    
                                    <?php
                            }else{
                                header("Location:login.php");
                            }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>