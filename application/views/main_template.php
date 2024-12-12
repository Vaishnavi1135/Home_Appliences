<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="<?php echo base_url();?>\assets\images\images.png" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="<?php echo base_url();?>/assets/css/all.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>/assets/css/font/bootstrap-icons.css" rel="stylesheet">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="<?php echo base_url();?>/assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
        <a href="index.html" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-2 text-white">Kolhapur Packers & Movers</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo base_url('home');?>" class="nav-item nav-link <?=$active=='Home'?'active':''?>">Home</a>
                <a href="<?php echo base_url('about');?>" class="nav-item nav-link <?=$active=='About'?'active':''?>">About</a>
                <a href="<?php echo base_url('services');?>" class="nav-item nav-link <?=$active=='Services'?'active':''?>">Services</a>
                <div class="nav-item dropdown">
                    <a href="<?php echo base_url('pages');?>" class="nav-link dropdown-toggle <?=$active=='Pages'?'active':''?>" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="<?php echo base_url('pages/some_facts');?>" class="dropdown-item">Some Facts</a>
                        <a href="<?php echo base_url('pages/our_features');?>" class="dropdown-item">Our Features</a>
                        <a href="<?php echo base_url('pages/pricing_plan');?>" class="dropdown-item">pricing Plan</a>
                        <a href="<?php echo base_url('pages/testimonial');?>" class="dropdown-item">Testimonial</a>
                        
                    </div>
                </div>
                <a href="<?php echo base_url('contact');?>" class="nav-item nav-link <?=$active=='Contact'?'active':''?>">Contact</a>


                <a href="<?php echo base_url('admin/login');?>" class="nav-item nav-link <?=$active=='login'?'active':''?>">Login</a>

                <!-- <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-3 me-2  <?=$active=='login'?'active':''?>" href="<?php echo base_url('admin/login');?>" >Login</button> -->


            </div>
        </div>

    </nav>

    <!-- Navbar End -->

        <?= $content ?>
        <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, Kolhapur, INDIA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>KPM@shifting.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="fa fa-facebook"></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="">PACKERS AND MOVERS</a>
                    <a class="btn btn-link" href="">CAR TRANSPORT</a>
                    <a class="btn btn-link" href="">WAREHOUSE SERVICES</a>
                    <a class="btn btn-link" href="">HIRE TRUCK & TEMPO</a>
                    <a class="btn btn-link" href="">CARGO SERVICES</a>
                    <a class="btn btn-link" href="">TRANSPORT SERVICES</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Services</a>
                    <a class="btn btn-link" href="">Pages</a>
                    <a class="btn btn-link" href="">Contact</a>
                   
                </div>
                <div class="col-lg-3 col-md-6">
                  
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Kolhapur Packers & Movers</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">Vaishnavi</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/<?php echo base_url();?>/assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>/assets/lib/wow/wow.min.js"></script>
        <script src="<?php echo base_url();?>/assets/lib/easing/easing.min.js"></script>
        <script src="<?php echo base_url();?>/assets/lib/waypoints/waypoints.min.js"></script>
        <script src="<?php echo base_url();?>/assets/lib/counterup/counterup.min.js"></script>
        <script src="<?php echo base_url();?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="<?php echo base_url();?>/assets/js/main.js"></script>8
    </body>
</html>

