<?php
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();

if ($_SESSION['is_login']) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'; </script>";
}
?>

<div class="col-sm-6 mt-5 mx-3">
  <form action="" method="get" class="mt-3 form-inline d-print-none">
    <div class="form-group mr-3">
      <label for="checkid">Enter Request ID: </label>
      <input type="text" class="form-control ml-3" id="checkid" name="checkid" autocomplete="off" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-danger">Search</button>
  </form>

  <?php
  if (isset($_GET['checkid']) && is_numeric($_GET['checkid'])) {
      $checkid = $_GET['checkid'];

      $stmt = $conn->prepare("SELECT * FROM assignwork_tb WHERE request_id = ?");
      $stmt->bind_param("i", $checkid);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
  ?>
      <h3 class="text-center mt-5">Assigned Work Details</h3>
      <table class="table table-bordered">
        <tbody>
          <tr><td>Request ID</td><td><?= htmlspecialchars($row['request_id']) ?></td></tr>
          <tr><td>Requested For</td><td><?= htmlspecialchars($row['request_service']) ?></td></tr>
          <tr><td>Vehicle Name & Model</td><td><?= htmlspecialchars($row['vehicle_name_model']) ?></td></tr>
          <tr><td>Name</td><td><?= htmlspecialchars($row['requester_name']) ?></td></tr>
          <tr><td>Registration Number</td><td><?= htmlspecialchars($row['registration_number']) ?></td></tr>
          <tr><td>Vehicle Type</td><td><?= htmlspecialchars($row['vehicle_type']) ?></td></tr>
          <tr><td>Pick up Address</td><td><?= htmlspecialchars($row['pickup_add']) ?></td></tr>
          <tr><td>City</td><td><?= htmlspecialchars($row['requester_city']) ?></td></tr>
          <tr><td>State</td><td><?= htmlspecialchars($row['requester_state']) ?></td></tr>
          <tr><td>Pin Code</td><td><?= htmlspecialchars($row['requester_zip']) ?></td></tr>
          <tr><td>Email</td><td><?= htmlspecialchars($row['requester_email']) ?></td></tr>
          <tr><td>Mobile</td><td><?= htmlspecialchars($row['requester_mobile']) ?></td></tr>
          <tr><td>Assigned Date</td><td><?= date("F j, Y", strtotime($row['assign_date'])) ?></td></tr>
          <tr>
  <td>Technician Name & Mobile</td>
  <td>
    <?= isset($row['assign_tech']) && $row['assign_tech'] 
        ? htmlspecialchars($row['assign_tech']) 
        : '' ?>
  </td>
</tr>
          <tr><td>Customer Sign</td><td></td></tr>
          <tr><td>Technician Sign</td><td></td></tr>
        </tbody>
      </table>

      <div class="text-center">
        <form class="d-print-none d-inline mr-3">
          <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
        </form>
        <form class="d-print-none d-inline" action="work.php">
          <input class="btn btn-secondary" type="submit" value="Close">
        </form>
      </div>

  <?php
      } else {
          echo '<div class="alert alert-dark mt-4" role="alert">
                Your Request is Still Pending </div>';
      }
      $stmt->close();
  } else if (isset($_GET['checkid'])) {
      echo '<div class="alert alert-warning mt-4" role="alert">Invalid Request ID provided.</div>';
  }
  ?>
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
?>
