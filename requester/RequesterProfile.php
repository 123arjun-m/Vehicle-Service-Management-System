<?php
define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();

if ($_SESSION['is_login']) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'; </script>";
    exit;
}

// Fetch existing name from database
$stmt = $conn->prepare("SELECT r_name FROM requesterlogin_tb WHERE r_email = ?");
$stmt->bind_param("s", $rEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $rName = $row['r_name'];
}

if (isset($_POST['nameupdate'])) {
    if (empty(trim($_POST['rName']))) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $newName = htmlspecialchars(trim($_POST['rName'])); // sanitize input

        $updateStmt = $conn->prepare("UPDATE requesterlogin_tb SET r_name = ? WHERE r_email = ?");
        $updateStmt->bind_param("ss", $newName, $rEmail);

        if ($updateStmt->execute()) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
            $rName = $newName; // update displayed name immediately
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
        }

        $updateStmt->close();
    }
}

$stmt->close();
?>

<div class="col-sm-6 mt-5">
  <form class="mx-5" method="POST">
    <div class="form-group">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" id="inputEmail" value="<?php echo htmlspecialchars($rEmail); ?>" readonly>
    </div>
    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" name="rName" value="<?php echo htmlspecialchars($rName); ?>">
    </div>
    <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
    <?php if (isset($passmsg)) { echo $passmsg; } ?>
  </form>
</div>

<?php
include('includes/footer.php'); 
?>
