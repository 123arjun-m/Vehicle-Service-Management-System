<?php
define('TITLE', 'Work Order');
define('PAGE', 'work');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>

<div class="col-sm-6 mt-5  mx-3">
 <h3 class="text-center">Assigned Work Details</h3>
 <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
 <table class="table table-bordered">
  <tbody>
   <tr>
    <td>Request ID</td>
    <td>
     <?php if(isset($row['request_id'])) {echo $row['request_id']; }?>
    </td>
   </tr>
   <tr>
    <td>Requested For</td>
    <td>
     <?php if(isset($row['request_service'])) {echo $row['request_service']; }?>
    </td>
   </tr>
   <tr>
    <td>Vehicle Name & Model</td>
    <td>
     <?php if(isset($row['vehicle_name_model'])) {echo $row['vehicle_name_model']; }?>
    </td>
   </tr>
   <tr>
    <td>Name</td>
    <td>
     <?php if(isset($row['requester_name'])) {echo $row['requester_name']; }?>
    </td>
   </tr>
   <tr>
    <td>Vehicle Registration No</td>
    <td>
     <?php if(isset($row['registration_number'])) {echo $row['registration_number']; }?>
    </td>
   </tr>
   <tr>
    <td>Vehicle Type</td>
    <td>
     <?php if(isset($row['vehicle_type'])) {echo $row['vehicle_type']; }?>
    </td>
   </tr>
   <tr>
    <td>Vehicle Registration Number</td>
    <td>
     <?php if(isset($row['pickup_add'])) {echo $row['pickup_add']; }?>
    </td>
   </tr>
   <tr>
    <td>City</td>
    <td>
     <?php if(isset($row['requester_city'])) {echo $row['requester_city']; }?>
    </td>
   </tr>
   <tr>
    <td>State</td>
    <td>
     <?php if(isset($row['requester_state'])) {echo $row['requester_state']; }?>
    </td>
   </tr>
   <tr>
    <td>Pin Code</td>
    <td>
     <?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; }?>
    </td>
   </tr>
   <tr>
    <td>Email</td>
    <td>
     <?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>
    </td>
   </tr>
   <tr>
    <td>Mobile</td>
    <td>
     <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>
    </td>
   </tr>
   <tr>
    <td>Technician Name</td>
    <td>
     <?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; }?>
    </td>
   </tr>
   <tr>
    <td>Assigned Date</td>
    <td>
     <?php if(isset($row['assign_date'])) {echo $row['assign_date']; }?>
    </td>
   </tr>
  
   <tr>
    <td>Customer Sign</td>
    <td></td>
   </tr>
   <tr>
    <td>Technician Sign</td>
    <td></td>
   </tr>
  </tbody>
 </table>
 <div class="text-center">
  <form class='d-print-none d-inline mr-3'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form>
  <form class='d-print-none d-inline' action="work.php"><input class='btn btn-secondary' type='submit' value='Close'></form>
 </div>
</div>

<?php
include('includes/footer.php'); 
?>