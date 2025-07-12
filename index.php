<?php
$background_image = 'images\automobilerepair1-1.jpg'; // Set your dynamic image path
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <style>
        body {
            background-image: url('<?php echo $background_image; ?>');
            background-size: cover; /* Optional: ensures the image covers the entire background */
            background-position: center; /* Optional: centers the image */
        }
    </style>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">

  <title>VSMS</title>
</head>

<body>
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
    <a href="index.php" class="navbar-brand">VSMS</a>
    <span class="navbar-text">Customer's Happiness is our Aim</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
      </ul>
    </div>
  </nav> <!-- End Navigation -->

  <!-- Start Header Jumbotron-->
  <header class="jumbotron back-image" style="background-image: url(images/automobilerepair1-1.jpg);">
    <div class="myclass mainHeading">
      <h1 class="text-uppercase text-danger font-weight-bold" style="height: 90vh"><center>Welcome to VEHICLE SERVICE MANAGEMENT SYSTEM</center></h1>
      <p class="font-italic " style="top:100;"><center>Customer's Happiness is our Aim</center></p>
      <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
      <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
    </div>
  </header> <!-- End Header Jumbotron -->

  <div class="container">
    <!--Introduction Section-->
    <div class="jumbotron">
      <h3 class="text-center">VSMS Services</h3>
      <p>
      Welcome to VSMS, your trusted destination for comprehensive vehicle care and repair services. We specialize in delivering top-quality automotive solutions including oil changes, tire replacements, engine diagnostics, brake services, and more — all designed to keep your vehicle running smoothly and safely. Our skilled technicians use the latest tools and technology to provide reliable, efficient, and affordable services tailored to your needs. Whether you're here for routine maintenance or emergency repairs, we’re committed to getting you back on the road with confidence. Experience service that drives satisfaction.
      </p>

    </div>
  </div>
  <!--Introduction Section End-->
  <!-- Start Services -->
  <div class="container text-center border-bottom" id="Services">
    <h2>Our Services</h2>
    <div class="form-row">

      <div class="col-sm-4 mb-4">
        <a href=""><i class=""></i></a>
        <img src="images/oilservice.jpg" style="width:100px; height:100px;">
        <h4 class="mt-4">OIL SERVICES</h4>
      </div>

      <div class="col-sm-4 mb-4">
        <a href=""><i class=""></i></a>
        <img src="images/punctureservice.webp" style="width:100px; height:100px;">
        <h4 class="mt-4">PUNCTURE SERVICE</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href=""><i class=""></i></a>
        <img src="images/waterwashservice.webp" style="width:100px; height:100px;">
        <h4 class="mt-4">WATER WASH</h4>
      </div>
    </div>

    <div class="form-row">
      <div class="col-sm-4 mb-4">
        <a href=""><i class=""></i></a>
        <img src="images/petrolservice.jpg" style="width:100px; height:100px;">
        <h4 class="mt-4">PETROL/DIESEL FILLING</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href=""><i class=""></i></a>
        <img src="images/breakdown.jpg" style="width:100px; height:100px;">
        <h4 class="mt-4">BREAKDOWN CLEARANCE</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href=""><i class=""></i></a>
        <img src="images/engine.webp" style="width:100px; height:100px;">
        <h4 class="mt-4">ENGINE TUNE-UP</h4>
      </div>
    </div>

    <div class="form-row">
      <div class="col-sm-4 mb-4">
        <a href=""><i class=""></i></a>
        <img src="images/tirereplacement.avif" style="width:100px; height:100px;">
        <h4 class="mt-4">TIRE REPLACEMENT</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href=""><i class=""></i></a>
        <img src="images/tow.jpg" style="width:100px; height:100px;">
        <h4 class="mt-4">TOWING</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href=""><i class=""></i></a>
        <img src="images/other.png" style="width:100px; height:100px;">
        <h4 class="mt-4">OTHER SERVICES</h4>
      </div>
    </div>

    </div>
  </div> <!-- End Services -->

  <!-- Start Registration  -->
  <?php include('userRegistration.php') ?>
  <!-- End Registration  -->
             
      

  <!--Start Contact Us-->
  <div class="container" id="Contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact US</h2> <!-- Contact Us Heading -->
    <div class="row">

      <!--Start Contact Us Row-->
      <?php include('contactform.php'); ?>
      <!-- End Contact Us 1st Column -->

      <div class="col-md-4 text-center">
        <!-- Start Contact Us 2nd Column-->
        <strong></strong>
        <a href="#" target="_blank">www.vsms.com</a> <br>

        <br><br>
        <strong></strong>
        <a href="#" target="_blank">www.vsms.com</a> <br>
      </div> <!-- End Contact Us 2nd Column-->
    </div> <!-- End Contact Us Row-->
  </div> <!-- End Contact Us Container-->
  <!-- End Contact Us -->

  <!-- Start Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
      <!-- Start Footer Container -->
      <div class="row py-3">
        <!-- Start Footer Row -->
        <div class="col-md-6">
          <!-- Start Footer 1st Column -->
          <span class="pr-2">Follow Us: </span>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div> <!-- End Footer 1st Column -->

        <div class="col-md-6 text-right">
          <!-- Start Footer 2nd Column -->
          <small>VEHICLE SERVICE MANAGEMENT&copy; 2025.
          </small>
          <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->
  </footer> <!-- End Footer -->

  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>