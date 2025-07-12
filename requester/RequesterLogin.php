<?php
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_login'])){
  if(isset($_REQUEST['rEmail'])){
    $rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
    $rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));
    $sql = "SELECT r_email, r_password FROM requesterlogin_tb WHERE r_email='".$rEmail."' AND r_password='".$rPassword."' limit 1";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
      
      $_SESSION['is_login'] = true;
      $_SESSION['rEmail'] = $rEmail;
      // Redirecting to RequesterProfile page on Correct Email and Pass
      echo "<script> location.href='RequesterProfile.php'; </script>";
      exit;
    } else {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
    }
  }
} else {
  echo "<script> location.href='RequesterProfile.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">

  <style>
    .custom-margin {
        margin-top: 8vh;
    }

    /* Add background image to the entire page */
    body {
        background-image: url('images/car.jpg'); /* Correct path with forward slashes */
        background-size: cover; /* Cover the entire page */
        background-position: center center; /* Center the image */
        background-repeat: no-repeat; /* Don't repeat the image */
    }
  </style>
  <title>Login</title>
</head>



<body style="background-image: url(image/car.jpg);">
  <div class="mb-3 text-center mt-5">
    
    <i class="" style="color:rgb(255, 255, 255);"></i>
    <span style="color:rgb(255, 255, 255);"><b><h1>vsms</h1></b></span>
  </div>
  <p class="text-center" style="font-size: 20px;" style="color:rgb(255, 255, 255);"> <i class=""></i> <span ><b>LOGIN</b> </span>
  </p>
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
        <form action="" class="shadow-lg p-4" method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
              class="form-control" placeholder="Email" name="rEmail">
            <!--Add text-white below if want text color white-->
            <small class="form-text">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <i class="fas fa-key" style="color:rgb(255, 255, 255);"></i><label for="pass" class="pl-2 font-weight-bold" style="color:rgb(7, 51, 247);">Pass Word</label><input type="password"
              class="form-control" placeholder="Password" name="rPassword">
          </div>
          <button type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold" style="color:rgb(255, 255, 255);">Login</button>
          <?php if(isset($msg)) {echo $msg; } ?>
        </form>
        <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>
      </div>
    </div>
  </div>

  <!-- Boostrap JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>

</html>