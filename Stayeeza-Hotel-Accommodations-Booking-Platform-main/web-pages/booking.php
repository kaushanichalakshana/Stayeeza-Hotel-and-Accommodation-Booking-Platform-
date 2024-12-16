<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Booking</title>
    <link rel="icon" href="../assets/img/logo-32x32.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.book.css">
    <link rel="stylesheet" href="../assets/css/styles-home.css">
</head>

<body style="background: url(&quot;assets/img/download%20.png&quot;), rgb(255,248,223);">
    <nav class="navbar navbar-expand-md py-3 navbar-light"
        style="background: #343a40;margin-top: -6px;padding-bottom: 22px;margin-bottom: -3px;padding-top: 5px;height: 86px;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img
                    src="../assets/img/stayeeza-low-resolution-logo-color-on-transparent-background%20(1).png" width="65"
                    height="58" style="padding-left: 0px;"></a><button data-bs-toggle="collapse" class="navbar-toggler"
                data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1"
                style="color: rgb(240,245,251);font-family: Montserrat, sans-serif;margin: -2px;margin-left: 12px;background: #343a40;padding: 12px;">
                <ul class="navbar-nav me-auto nav-clr">
                    <li class="nav-item"><a class="nav-link  nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Hotels</a></li>
                    <li class="nav-item"><a class="nav-link hide" href="#">Dashboard</a></li>
                </ul><button class="btn btn-primary me-3" type="button" style="margin-right: 20px;">LOG
                    IN</button><button class="btn btn-primary me-3" type="button">REGISTER</button>
            </div>
        </div>
    </nav>
    <div></div>
    <div class="container py-2 py-xl-5">
        <h1 style="text-align: center;font-size: 49px;font-family: Alatsi, sans-serif;color: #343a40;">Book Your Perfect
            Getaway</h1>
        <div class="row gy-4 gy-md-0" style="background: #343a40;border-radius: 9px;">
            <div class="col-md-6 d-flex align-items-center">
                <div class="m-xl-5"><img class="rounded img-fluid w-100 fit-cover p-2" 
                        src="assets/img/luxury-pool-villa-spectacular-contemporary-design-digital-art-real-estate-home-house-property-ge.jpg"
                        width="456" height="304"></div>
            </div>
            <div class="col-md-6 d-md-flex align-items-md-center p-3">
                <div class="p-xl-5">
                    <h2 class="text-uppercase fw-bold text-center" style="color: var(--bs-body-bg);">Tranquil Sands
                        Resort<br><i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                        <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                        <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                        <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i>
                        <i class="fab fas fa-star fa-spin" style="color: #ffd700;"></i></h2>
                        
                    <p class="my-3" style="text-align: justify;color: var(--bs-body-bg);">A haven of serenity nestled
                        along the picturesque coastline. Immerse yourself in a world of luxury and comfort, where every
                        detail has been meticulously crafted to ensure an unforgettable stay. Indulge in the ultimate
                        relaxation at our infinity pool, offering breathtaking views of the sparkling ocean. Rejuvenate
                        your senses at our exquisite spa, where skilled therapists await to pamper you with rejuvenating
                        treatments. Delight your palate with culinary delights at our gourmet restaurant, serving
                        delectable dishes created with the finest ingredients.&nbsp;</p>
                </div>
            </div>
            <div class="col col-12"><button class="btn btn-primary col-12 mb-3" type="button"
                    style="border-radius: 54px;font-weight: bold;background: rgb(14,182,21);border-color: rgb(14,182,21);">AVAILABLE</button>
            </div>
        </div>
    </div>
    <div>
        <div class="col-12 d-flex mt-3">
            <div class="container-fluid d-flex justify-content-center">
                <form class="col-md-12 col-sm-12 col-lg-8">
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="mb-3"><label class="form-label" for="service_name"><strong>Full
                                                Name</strong></label><input class="form-control" type="text"
                                            id="service_name" placeholder="Name service" name="service_name"
                                            required=""></div>
                                </div>
                            </div>
                            <div class="mb-3"></div>
                            <div class="mb-3"></div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label"
                                            for="service_client_start_date"><strong>Check in
                                                Date&nbsp;</strong></label><input class="form-control"
                                            id="service_client_start_date-1" type="date"
                                            name="service_client_start_date" required=""></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label"
                                            for="service_client_end_date"><strong>Check out Date</strong></label><input
                                            class="form-control" id="service_client_end_date-1" type="date"
                                            name="service_client_end_date" required=""></div>
                                </div>
                            </div>
                            <div class="mb-3"><label class="form-label"
                                    for="service_client_payment_validated"><strong>Number Of Persons</strong></label>
                                <div class="form-group mb-3 col-xs-12 col-sm-6"><input class="form-control"
                                        type="number"></div>
                            </div>
                            <div class="mb-3"><label class="form-label"
                                    for="service_client_payment_validated"><strong>Number Of Rooms</strong></label>
                                <div class="form-group mb-3 col-xs-12 col-sm-6"><input class="form-control"
                                        type="number"></div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end mb-3"><button class="btn btn-primary me-3 btn-lg " type="submit">Book Your
                            Room</button></div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <h1 class="text-center">Feedback</h1>
        <div class="container py-4 py-xl-5" style="background: #343a40;">
            <div class="row">
                <div class="col-md-8 col-xl-6 mx-auto col-xl-8"
                    style="background: rgba(255,255,255,0.82);border-radius: 32px;">
                    <div class="d-flex align-items-center align-items-md-start align-items-xl-center"><img
                            class="rounded-circle flex-shrink-0 me-3 fit-cover" width="85" height="82"
                            src="assets/img/handsome-man-enjoying-view-during-hiking-trip.jpg">
                        <div>
                            <h4>Alexander Rodriguez</h4>
                            <p>Our stay at Tranquil Sands Resort was nothing short of paradise. The stunning beachfront
                                location, impeccable service, and luxurious facilities exceeded our expectations. The
                                infinity pool overlooking the ocean was a highlight, and the spa treatments left us
                                feeling rejuvenated. A truly tranquil and unforgettable experience.</p>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex align-items-center align-items-md-start align-items-xl-center"><img
                            class="rounded-circle flex-shrink-0 me-3 fit-cover" width="85" height="82"
                            src="assets/img/low-angle-female-traveler-bridge.jpg">
                        <div>
                            <h4>Olivia Thompson</h4>
                            <p>Tranquil Sands Resort provided the perfect setting for a relaxing getaway. The attentive
                                staff, spacious and comfortable rooms, and the breathtaking views created a serene
                                ambiance. The on-site restaurant served delectable cuisine, and the beachfront access
                                allowed for leisurely walks along the pristine shoreline. Highly recommended for those
                                seeking a peaceful retreat</p>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex align-items-center align-items-md-start align-items-xl-center"><img
                            class="rounded-circle flex-shrink-0 me-3 fit-cover" width="85" height="82"
                            src="assets/img/close-up-smiley-man-nature.jpg">
                        <div>
                            <h4>Ethan Sullivan</h4>
                            <p>We were blown away by the exceptional hospitality and facilities at Tranquil Sands
                                Resort. From the moment we arrived, we were greeted with warm smiles and personalized
                                service. The spa treatments were heavenly, and the infinity pool offered a captivating
                                view of the ocean. This resort truly knows how to create a tranquil and luxurious
                                experience.</p>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex align-items-center align-items-md-start align-items-xl-center"><img
                            class="rounded-circle flex-shrink-0 me-3 fit-cover" width="85" height="82"
                            src="assets/img/front-view-smiley-woman-seaside.jpg">
                        <div>
                            <h4>Isabella Garcia</h4>
                            <p>Our stay at Tranquil Sands Resort was an absolute dream. The attention to detail in every
                                aspect, from the beautifully designed rooms to the well-manicured gardens, was
                                impressive. The staff went above and beyond to ensure our comfort, and the gourmet
                                dining experience was top-notch. We left feeling refreshed, rejuvenated, and longing to
                                return to this serene paradise.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-4 py-xl-5" style="background: #343a40;">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto col-xl-8" style="color: var(--bs-body-bg);">
                    <h2><strong>Unwind in Luxury: Discover the Epitome of Elegance at our Exquisite Hotel</strong></h2>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
                <div class="col">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;"
                            src="assets/img/elegant-hotel-room-with-window.jpg">
                        <div class="card-body p-4">
                            <h4 class="card-title">Emerald Palace Hotel</h4>
                            <p class="card-text">Experience regal grandeur at Emerald Palace Hotel, where timeless
                                sophistication meets modern luxury. Located in the heart of the city, our hotel boasts
                                exquisite architecture, luxurious rooms, and a host of world-class amenities.</p>
                            <div class="d-flex"><button class="btn btn-primary me-3" type="button">Book</button></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;"
                            src="assets/img/beautiful-embankment-walking-sport-amara-dolce-vita-luxury-hotel-alanya-turkey.jpg">
                        <div class="card-body p-4">
                            <h4 class="card-title">Sapphire Sands Resort</h4>
                            <p class="card-text">Indulge in opulent luxury at Sapphire Sands Resort, where a world of
                                elegance awaits. Nestled along a pristine coastline, our resort offers breathtaking
                                ocean views, lavish accommodations, and exceptional amenities.&nbsp;</p>
                            <div class="d-flex">
                                <div><button class="btn btn-primary me-3" type="button">Book</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;"
                            src="assets/img/view-pool-hotel-ocean-water.jpg">
                        <div class="card-body p-4">
                            <h4 class="card-title">Ivory Retreat Lodge</h4>
                            <p class="card-text">Discover tranquility in the lap of nature at Ivory Retreat Lodge, a
                                hidden gem amidst lush landscapes. Surrounded by majestic mountains and serene forests,
                                our lodge offers cozy cabins, warm hospitality, and a range of outdoor activities.&nbsp;
                            </p>
                            <div class="d-flex">
                                <div><button class="btn btn-primary me-3" type="button">Book</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container justify-content-center d-flex"><button class="btn btn-primary col-6 btn-more mt-3"
                    type="button">More Hotels</button></div>
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
    <script src="https://kit.fontawesome.com/415a9991c1.js" crossorigin="anonymous"></script>
</body>

</html>