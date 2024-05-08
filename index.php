<!DOCTYPE html>
<html>
<?php 
    session_start(); 
    require 'connection.php';
    $conn = Connect();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rush Drive</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato"> 	
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
 
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Rush<span>Drive</span></a>
            <?php
                if(isset($_SESSION['login_client'])){
            ?> 
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item"> 
                        <a href="entercar.php" class="nav-link">Add Car</a>
                    </li>
                    <li class="nav-item">
                        <a href="updatecar.php" class="nav-link">Update Car</a>
                    </li>
                    <li class="nav-item"> 
                        <a href="clientview.php" class="nav-link">View</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_client']; ?>
                        </a>
                    </li>
                    <li class="nav-item">   
                        <a href="logout.php" class="nav-link">
                            <span class="glyphicon glyphicon-log-out"></span>Logout
                        </a>
                    </li>
                </ul>
            </div>
            <?php
                }
                else if (isset($_SESSION['login_customer'])){
            ?>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item"> 
                        <a href="prereturncar.php" class="nav-link">Return Now</a>
                    </li>
                    <li class="nav-item"> 
                        <a href="mybookings.php" class="nav-link"> My Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?>
                        </a>
                    </li>
                    <li class="nav-item">   
                        <a href="logout.php" class="nav-link">
                            <span class="glyphicon glyphicon-log-out"></span>Logout
                        </a>
                    </li>
                </ul>
            </div>
            <?php
                }
                else {
            ?>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="index.ph" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="clientlogin.php" class="nav-link">Agency</a>
                    </li>
                    <li class="nav-item">
                        <a href="customerlogin.php" class="nav-link">Consumer</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
            <?php   
                }
            ?>    
        </div>
    </nav>
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('assets/img/background.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
                        <p style="font-size: 18px;">" Freedom on wheels: where every journey begins with your choice. Rent, drive, and explore at your own pace."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Available Cars</h3>
        <br>
        <section class="menu-content">
            <?php   
                $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
                $result1 = mysqli_query($conn,$sql1);

                if(mysqli_num_rows($result1) > 0) {
                    while($row1 = mysqli_fetch_assoc($result1)){
                        $car_id = $row1["car_id"];
                        $car_name = $row1["car_name"];
                        $car_model = $row1["car_model"];
                        $price_per_day = $row1["price_per_day"];
                        $seating_capacity = $row1["seating_capacity"];
                        $car_img = $row1["car_img"];
            ?>
           <div class="sub-menu">            
    <!-- Replace the <a> tag with a button or a link -->
    <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
    <h5><b> <?php echo ($car_name . " " . $car_model); ?> </b></h5>
    <h6> Fare(/day): <?php echo ("Rs. " . $price_per_day . "/km"); ?></h6>
    <h6> Seating Capacity: <?php echo $seating_capacity; ?></h6>
    <a href="booking.php?id=<?php echo($car_id) ?>" class="btn btn-primary">Rent Car</a>

</div>

            <?php }}
                else {
            ?>
            <h1> No cars available :( </h1>
            <?php
                }
            ?>                                   
        </section>
    </div>
    <div class="bgimg-2">
        <div class="caption">
            <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;"></span>
        </div>
    </div>
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">
                            <a href="#" class="logo">Rush<span>drive</span></a>
                        </h2>
                        <p>Freedom on wheels: where every journey begins with your choice. Rent, drive, and explore at your own pace.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yRushDrive.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="#" target="_blank"></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/theme.js"></script>
	
	
	
  <script src="assets/js/front/jquery.min.js"></script>
  <script src="assets/js/front/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/front/popper.min.js"></script>
  <script src="assets/js/front/bootstrap.min.js"></script>
  <script src="assets/js/front/jquery.easing.1.3.js"></script>
  <script src="assets/js/front/jquery.waypoints.min.js"></script>
  <script src="assets/js/front/jquery.stellar.min.js"></script>
  <script src="assets/js/front/owl.carousel.min.js"></script>
  <script src="assets/js/front/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/front/aos.js"></script>
  <script src="assets/js/front/jquery.animateNumber.min.js"></script>
  <script src="assets/js/front/bootstrap-datepicker.js"></script>
  <script src="assets/js/front/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="jassets/js/front/google-map.js"></script>
  <script src="assets/js/front/main.js"></script>
	
	
	
</body>

</html>