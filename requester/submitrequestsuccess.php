<?php
define('TITLE', 'Success');
define('PAGE', 'Submitrequestsuccess');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();

if ($_SESSION['is_login']) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'; </script>";
    exit;
}

if (isset($_SESSION['myid']) && is_numeric($_SESSION['myid'])) {
    $reqId = $_SESSION['myid'];

    $stmt = $conn->prepare("SELECT * FROM submitrequest_tb WHERE request_id = ?");
    $stmt->bind_param("i", $reqId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>
        <div class="ml-5 mt-5">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Request ID</th>
                        <td><?= htmlspecialchars($row['request_id']) ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?= htmlspecialchars($row['requester_name']) ?></td>
                    </tr>
                    <tr>
                        <th>Email ID</th>
                        <td><?= htmlspecialchars($row['requester_email']) ?></td>
                    </tr>
                    <tr>
                        <th>Requested for</th>
                        <td><?= htmlspecialchars($row['request_service']) ?></td>
                    </tr>
                    <tr>
                        <th>Vehicle Name & Model</th>
                        <td><?= htmlspecialchars($row['vehicle_name_model']) ?></td>
                    </tr>
                    <tr>
                        <th>Vehicle Type</th>
                        <td><?= htmlspecialchars($row['vehicle_type']) ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form class="d-print-none">
                                <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo "<div class='alert alert-danger'>Failed to fetch request details.</div>";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-warning'>Invalid or missing request ID.</div>";
}
?>

<?php
include('includes/footer.php'); 
$conn->close();
?>
