<?php
if(session_id() == '') {
  session_start();
}

include('../dbConnection.php'); // Ensure this file is included for database connection

if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
} else {
  echo "<script> location.href='login.php'; </script>";
  exit;
}

if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
}

// Handle form submission for assigning work order
if(isset($_REQUEST['assign'])){
  // Check if any required field is empty
  if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_service'] == "") || ($_REQUEST['vehicle_name_model'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['registration_number'] == "") || ($_REQUEST['vehicletype'] == "") ||($_REQUEST['pickup_add'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "")){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
  } else {
    // Assign values to variables
    $rid = $_REQUEST['request_id'];
    $rinfo = $_REQUEST['request_service'];
    $vnamemodel = $_REQUEST['vehicle_name_model'];
    $rname = $_REQUEST['requestername'];
    $rno = $_REQUEST['registration_number'];
    $type = $_REQUEST['vehicletype'];  // Make sure this field is being handled correctly
    $padd = $_REQUEST['pickup_add'];
    $rcity = $_REQUEST['requestercity'];
    $rstate = $_REQUEST['requesterstate'];
    $rzip = $_REQUEST['requesterzip'];
    $remail = $_REQUEST['requesteremail'];
    $rmobile = $_REQUEST['requestermobile'];
    $rassigntech = $_REQUEST['assigntech'];
    $rdate = $_REQUEST['inputdate'];

    // Prepare and execute the query to insert the data into the assignwork_tb table
    $stmt = $conn->prepare("INSERT INTO assignwork_tb 
                            (request_id, request_service, vehicle_name_model, requester_name, registration_number, vehicle_type, pickup_add, requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_tech, assign_date) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssssssss", $rid, $rinfo, $vnamemodel, $rname, $rno, $type, $padd, $rcity, $rstate, $rzip, $remail, $rmobile, $rassigntech, $rdate);
    
    if($stmt->execute()) {
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Work Assigned Successfully</div>';
    } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Assign Work</div>';
    }
  }
}
?>

<div class="col-sm-5 mt-5 jumbotron">
  <!-- Form to assign work order -->
  <form action="" method="POST">
    <h5 class="text-center">Assign Work Order Request</h5>
    
    <!-- Request ID -->
    <div class="form-group">
      <label for="request_id">Request ID</label>
      <input type="text" class="form-control" id="request_id" name="request_id" value="<?php echo isset($row['request_id']) ? $row['request_id'] : ''; ?>" readonly>
    </div>
    
    <!-- Request Service -->
    <div class="form-group">
      <label for="request_service">Request Service</label>
      <input type="text" class="form-control" id="request_service" name="request_service" value="<?php echo isset($row['request_service']) ? $row['request_service'] : ''; ?>">
    </div>
    
    <!-- Request Description -->
    <div class="form-group">
      <label for="vehicle_name_model">Vehicle Name & Model</label>
      <input type="text" class="form-control" id="vehicle_name_model" name="vehicle_name_model" value="<?php echo isset($row['vehicle_name_model']) ? $row['vehicle_name_model'] : ''; ?>">
    </div>
    
    <!-- Requester Name -->
    <div class="form-group">
      <label for="requestername">Name</label>
      <input type="text" class="form-control" id="requestername" name="requestername" value="<?php echo isset($row['requester_name']) ? $row['requester_name'] : ''; ?>">
    </div>
    
    <!-- Address Line 1 & 2 -->
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="registration_number">Vehicle Registration No</label>
        <input type="text" class="form-control" id="address1" name="registration_number" value="<?php echo isset($row['registration_number']) ? $row['registration_number'] : ''; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="vehicletype">Vehicle Type</label>
        <input type="text" class="form-control" id="vehicletype" name="vehicletype" value="<?php echo isset($row['vehicle_type']) ? $row['vehicle_type'] : ''; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="pickup_add">Vehicle Registration No</label>
        <input type="text" class="form-control" id="address2" name="pickup_add" value="<?php echo isset($row['pickup_add']) ? $row['pickup_add'] : ''; ?>">
      </div>
    </div>

    <!-- City, State, Zip -->
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="requestercity">City</label>
        <input type="text" class="form-control" id="requestercity" name="requestercity" value="<?php echo isset($row['requester_city']) ? $row['requester_city'] : ''; ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="requesterstate">State</label>
        <input type="text" class="form-control" id="requesterstate" name="requesterstate" value="<?php echo isset($row['requester_state']) ? $row['requester_state'] : ''; ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="requesterzip">Zip</label>
        <input type="text" class="form-control" id="requesterzip" name="requesterzip" value="<?php echo isset($row['requester_zip']) ? $row['requester_zip'] : ''; ?>" onkeypress="isInputNumber(event)">
      </div>
    </div>

    <!-- Email and Mobile -->
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="requesteremail">Email</label>
        <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php echo isset($row['requester_email']) ? $row['requester_email'] : ''; ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="requestermobile">Mobile</label>
        <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php echo isset($row['requester_mobile']) ? $row['requester_mobile'] : ''; ?>" onkeypress="isInputNumber(event)">
      </div>
    </div>

    <!-- Assign to Technician & Date -->
    <div class="form-row">
  <div class="form-group col-md-6">
    <label for="assigntech">Assign to Technician</label>
    <select class="form-control" id="assigntech" name="assigntech">
      <option value="">-- Assign Technician --</option>
      <option value="ARJUN/9150274788">ARJUN/9150274788</option>
      <option value="VINAYAK/9150274789">VINAYAK/9150274789</option>
    </select>
  </div>

      <div class="form-group col-md-6">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="inputdate">
      </div>
    </div>

    <!-- Submit & Reset Buttons -->
    <div class="float-right">
      <button type="submit" class="btn btn-success" name="assign">Assign</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form>

  <?php if(isset($msg)) { echo $msg; } ?>
</div>

<!-- Allow only numbers for zip and mobile -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
