<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit();
}

require_once("../db_connect.php");

$query="SELECT 
            appointments.*, 
            patients.full_name 
        FROM appointments 
        JOIN patients 
        ON appointments.patient_id = patients.patient_id";

$result=mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

<?php include("../includes/sidebar.php"); ?>

<div class="flex-grow-1" style="margin-left:250px;">
    <div class="container mt-5 mb-5">

        <h2>Appointment List</h2>
        <hr class="mb-4">

        <table class="table table-striped table-hover table-bordered bg-white shadow-sm align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Staff</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th style="width: 280px;">Status / Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                ?>
                <tr>
                    <td><?php echo $row['appointment_id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['staff_name']; ?></td>
                    <td><?php echo $row['appointment_date']; ?></td>
                    <td><?php echo $row['appointment_time']; ?></td>
                    <td>
                        <form method="POST" action="update_status.php">
                            <input type="hidden" name="id" value="<?php echo $row['appointment_id']; ?>">
                            
                            <div class="input-group input-group-sm">
                                <select name="status" class="form-select form-select-sm">
                                    <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="Completed" <?php echo ($row['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                    <option value="Cancelled" <?php echo ($row['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                                    <option value="Missed" <?php echo ($row['status'] == 'Missed') ? 'selected' : ''; ?>>Missed</option>
                                    <option value="Rescheduled" <?php echo ($row['status'] == 'Rescheduled') ? 'selected' : ''; ?>>Rescheduled</option>
                                </select>
                                <button type="submit" class="btn btn-warning sm">Update</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>

<?php include("../includes/footer.php"); ?>

</body>
</html>