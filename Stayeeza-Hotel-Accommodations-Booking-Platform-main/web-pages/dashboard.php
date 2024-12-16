<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="icon" href="assets/img/logo-32x32.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/css/styles-dash.css">
    <link rel="stylesheet" href="../assets/css/styles-home.css">
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
            <ul class="navbar-nav me-auto nav-clr">
                <li class="nav-item"><a class="nav-link  nav-link" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Hotels</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Add Hotel</a></li>
                
            </ul><button class="btn btn-primary me-3" type="button" style="margin-right: 20px;">LOG
                IN</button><button class="btn btn-primary me-3" type="button">REGISTER</button>
        </div>
    </div>
</nav><br>
    <div class="container-fluid" style="margin-bottom: 50px;">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <h3 class="text-black mb-4">Dashboard</h3>
            </div>
            <div class="col-12 col-sm-6 col-md-6 text-end" style="margin-bottom: 30px;"><a class="btn btn-primary"
                    role="button"><i class="fa fa-plus"></i>&nbsp;Add Hotels</a></div>
        </div>
        <div class="card" id="TableSorterCard" style="border-style: none;border-radius: 6.5px;">
            <div class="card-header py-3" style="border-width: 0px;background: rgb(23,25,33);">
                <div class="row table-topper align-items-center">
                    <div class="col-12 col-sm-5 col-md-6 text-start" style="margin: 0px;padding: 5px 15px;">
                        <p class="m-0 fw-bold" style="color: rgb(255,255,255);">Hotels</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive" style="border-top-style: none;background: #171921;">
                        <table class="table table-striped table tablesorter" id="ipi-table">
                            <thead class="thead-dark"
                                style="background: rgb(33,37,48);border-width: 0px;border-color: rgb(0,0,0);border-bottom-color: #21252F;">
                                <tr style="border-style: none;border-color: rgba(255,255,255,0);background: #21252f;">
                                    <th class="text-center">Hotel ID</th>
                                    <th class="text-center">Hotel Name</th>
                                    <th class="text-center">Hotel Email</th>
                                    <th class="text-center filter-false sorter-false">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="border-top-width: 0px;">
                                <tr style="background: #262a38;">
                                    <td style="color: rgb(0,0,0);">HR001</td>
                                    <td style="color: rgb(5,5,5);">The Grand Tower Hotel</td>
                                    <td style="color: rgb(0,0,0);">grandtower@gmail.com</td>
                                    <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a
                                            class="btn btnMaterial btn-flat primary semicircle" role="button" href="#"
                                            style="color: #00bdff;"><i class="far fa-eye"></i></a><a
                                            class="btn btnMaterial btn-flat success semicircle" role="button" href="#"
                                            style="color: rgb(0,197,179);"><i class="fas fa-pen"></i></a><a
                                            class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover"
                                            role="button" style="margin-left: 5px;" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal" href="#"><i class="fas fa-trash btnNoBorders"
                                                style="color: #DC3545;"></i></a></td>
                                </tr>
                                <tr style="background: #212430;">
                                    <td style="color: rgb(0,0,0);">HR002</td>
                                    <td style="color: rgb(0,0,0);">Royal Oasis Lodge</td>
                                    <td style="color: rgb(0,0,0);">royal.oasis@gmail.com</td>
                                    <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a
                                            class="btn btnMaterial btn-flat primary semicircle" role="button" href="#"
                                            style="color: #00bdff;"><i class="far fa-eye"></i></a><a
                                            class="btn btnMaterial btn-flat success semicircle" role="button" href="#"
                                            style="color: rgb(0,197,179);"><i class="fas fa-pen"></i></a><a
                                            class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover"
                                            role="button" style="margin-left: 5px;" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal" href="#"><i class="fas fa-trash btnNoBorders"
                                                style="color: #DC3545;"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-xxl-3 footer-navigation col-sm-4">
                <h3><img src="assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>