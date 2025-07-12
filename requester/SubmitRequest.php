<?php
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
if(isset($_REQUEST['submitrequest'])){
 // Checking for Empty Fields
 if(($_REQUEST['requestservice'] == "") || ($_REQUEST['vehicle_name_model'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['registration_number'] == "") || ($_REQUEST['vehicletype'] == "") || ($_REQUEST['pickup_add'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
   $rinfo = $_REQUEST['requestservice'];
   $vnamemodel = $_REQUEST['vehicle_name_model'];
   $rname = $_REQUEST['requestername'];
   $rno = $_REQUEST['registration_number'];
   $type = $_REQUEST['vehicletype'];
   $padd = $_REQUEST['pickup_add'];
   $rcity = $_REQUEST['requestercity'];
   $rstate = $_REQUEST['requesterstate'];
   $rzip = $_REQUEST['requesterzip'];
   $remail = $_REQUEST['requesteremail'];
   $rmobile = $_REQUEST['requestermobile'];
   $rdate = $_REQUEST['requestdate'];
   $sql = "INSERT INTO submitrequest_tb(request_service, vehicle_name_model, requester_name, registration_number, vehicle_type, pickup_add, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo','$vnamemodel', '$rname', '$rno', '$type', '$padd', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
   if($conn->query($sql) == TRUE){
    // below msg display on form submit success
    $genid = mysqli_insert_id($conn);
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully Your' . $genid .' </div>';
    session_start();
    $_SESSION['myid'] = $genid;
    echo "<script> location.href='submitrequestsuccess.php'; </script>";
    // include('submitrequestsuccess.php');
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your Request </div>';
   }
 }
}
?>

<div class="col-sm-9 col-md-10 mt-5">
<h1><center>PAY AFTER SERVICE</center></h1>
  <form class="mx-5" action="" method="POST">
  <div class="form-group">
  <label for="inputRequestservice">Services</label>
  <select class="form-control" id="inputRequestservice" name="requestservice">
    <option value="">-- Select a Service --</option>
    <option value="OIL SERVICE">OIL SERVICE</option>
    <option value="PUNCTURE SERVICE">PUNCTURE SERVICE</option>
    <option value="WATER WASH">WATER WASH</option>
    <option value="PETROL FILLING">PETROL FILLING</option>
    <option value="DIESEL FILLING">DIESEL FILLING</option>
    <option value="BREAKDOWN CLEARANCE">BREAKDOWN CLEARANCE</option>
    <option value="ENGINE TUNE-UP">ENGINE TUNE-UP</option>
    <option value="TIRE REPLACEMENT">TIRE REPLACEMENT</option>
    <option value="TOWING">TOWING</option>
  </select>
</div>

    <div class="form-group">
      <label for="inputRequestDescription">Vehicle name/Model</label>
      <input type="text" class="form-control" id="inputRequestDescription" placeholder="vehicle name and model" name="vehicle_name_model">
    </div>
    <div class="form-group">
      <label for="inputName">Vehicle Owner Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Enter your Name" name="requestername">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="registration_number">Vehicle Registration Number</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="vehicle Registration no" name="registration_number">
      </div>
      <div class="form-group col-md-6">
  <label for="inputtype">Type of vehicle</label>
  <select class="form-control" id="inputtype" name="vehicletype">
    <option value="">-- Select Vehicle Type --</option>
    <option value="TWO WHEELER">TWO WHEELER</option>
    <option value="THREE WHEELER">THREE WHEELER</option>
    <option value="FOUR WHEELER">FOUR WHEELER</option>
    <option value="HEAVY WHEELER">HEAVY WHEELER</option>
  </select>
</div>

      <div class="form-group col-md-6">
        <label for="pickup_add">Pick up Address</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="pick up address" name="pickup_add">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" name="requestercity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <input type="text" class="form-control" id="inputState" name="requesterstate">
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="requesteremail">
      </div>
      <div class="form-group col-md-2">
        <label for="inputMobile">Mobile</label>
        <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
      </div>
      <div class="form-group col-md-2">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="requestdate">
      </div>
    </div>

    <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div>
</div>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
$conn->close();
?>