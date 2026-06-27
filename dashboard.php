<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

require_once("db_connect.php");

$patients = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM patients")
);

$appointments = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM appointments")
);

$records = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM medical_records")
);

$referrals = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM referrals")
);
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{
    overflow-x:hidden;
}

.main-content{
    margin-left:240px;
    padding:20px;
}

</style>

</head>

<body>

<?php include("../medical_collab_system/includes/sidebar.php"); ?>

<div class="main-content">

<h1>
Welcome <?php echo $_SESSION['username']; ?>
</h1>

<h4>
Role: <?php echo $_SESSION['role']; ?>
</h4>

<hr>

<!-- Statistics Cards -->

<div class="row">

<div class="col-md-3">
<div class="card p-3 shadow-sm">
<h5>Total Patients</h5>
<h2><?php echo $patients; ?></h2>
</div>
</div>

<div class="col-md-3">
<div class="card p-3 shadow-sm">
<h5>Appointments</h5>
<h2><?php echo $appointments; ?></h2>
</div>
</div>

<div class="col-md-3">
<div class="card p-3 shadow-sm">
<h5>Records</h5>
<h2><?php echo $records; ?></h2>
</div>
</div>

<div class="col-md-3">
<div class="card p-3 shadow-sm">
<h5>Referrals</h5>
<h2><?php echo $referrals; ?></h2>
</div>
</div>

</div>

<br>

<!-- Chart -->

<div class="card p-4 shadow-sm">

<h4>System Statistics</h4>

<canvas id="myChart"></canvas>

</div>

<br>

<!-- Quick Actions -->

<h4>Quick Actions</h4>

<a href="patient_registration.php"
class="btn btn-primary mb-2">
Register Patient
</a>

<a href="patients/view_patients.php"
class="btn btn-warning mb-2">
View Patients
</a>

<a href="medical_records/add_record.php"
class="btn btn-info mb-2">
Add Record
</a>

<a href="medical_records/view_records.php"
class="btn btn-secondary mb-2">
View Records
</a>

<a href="appointments/add_appointment.php"
class="btn btn-primary mb-2">
Schedule Appointment
</a>

<a href="appointments/view_appointments.php"
class="btn btn-warning mb-2">
View Appointments
</a>

<a href="referrals/add_referral.php"
class="btn btn-danger mb-2">
Create Referral
</a>

<a href="referrals/view_referrals.php"
class="btn btn-dark mb-2">
View Referrals
</a>

<a href="messages/send_message.php"
class="btn btn-success mb-2">
Send Message
</a>

<a href="messages/view_messages.php"
class="btn btn-secondary mb-2">
View Messages
</a>



<a href="reports/reports.php"
class="btn btn-dark">

Generate Reports

</a>
<br><br>

<a href="logout.php" class="btn btn-outline-danger">
Logout
</a>

</div>

<script>

new Chart(
    document.getElementById('myChart'),
    {
        type:'bar',

        data:{
            labels:[
                'Patients',
                'Appointments',
                'Records',
                'Referrals'
            ],

            datasets:[{
                label:'System Statistics',

                data:[
                    <?php echo $patients; ?>,
                    <?php echo $appointments; ?>,
                    <?php echo $records; ?>,
                    <?php echo $referrals; ?>
                ]
            }]
        }
    }
);

</script>

<?php include("../medical_collab_system/includes/footer.php"); ?>

</body>
</html>