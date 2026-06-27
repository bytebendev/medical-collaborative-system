<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit();
}
?>

<?php
require_once("../db_connect.php");

$query="SELECT 
            medical_records.*, 
            patients.full_name 
        FROM medical_records 
        JOIN patients 
        ON medical_records.patient_id = patients.patient_id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Medical Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include("../includes/sidebar.php"); ?>

<div style="margin-left:250px;">
    <div class="container mt-5">
        <h2>Medical Records History</h2>
        
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Diagnosis</th>
                <th>Treatment</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['record_id']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['diagnosis']; ?></td>
                <td><?php echo $row['treatment']; ?></td>
                <td><?php echo $row['date_created']; ?></td>
                <td>
                    <a href="edit_record.php?id=<?php echo $row['record_id']; ?>" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <a href="delete_record.php?id=<?php echo $row['record_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this medical record?');">
                            Delete
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<footer>
<?php include("../includes/footer.php"); ?>
</footer>
</body>
</html>