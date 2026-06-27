<?php

session_start();

if(!isset($_SESSION['username'])){

header("Location:login.php");

exit();

}
?>

<?php

require_once("../db_connect.php");

if(isset($_POST['submit']))
{

$patient=$_POST['patient_id'];

$staff=$_POST['staff_name'];

$date=$_POST['appointment_date'];

$time=$_POST['appointment_time'];

$sql="INSERT INTO appointments
(patient_id,staff_name,
appointment_date,
appointment_time)

VALUES

('$patient',
'$staff',
'$date',
'$time')";


if(mysqli_query($conn,$sql))
{

echo "<script>
alert('Appointment Created')
</script>";

}
else
{

echo mysqli_error($conn);

}

}

$patients=mysqli_query(
$conn,
"SELECT * FROM patients"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Appointment</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>
<?php include("../includes/sidebar.php"); ?>

<div style="margin-left:250px;">



<div class="container mt-5">

<h2>Schedule Appointment</h2>

<form method="POST">

<label>Patient</label>

<select
name="patient_id"
class="form-control"
required>

<option value="">
Select Patient
</option>

<?php
while($row=mysqli_fetch_assoc($patients))
{
?>

<option
value="<?php echo $row['patient_id']; ?>">

<?php echo $row['full_name']; ?>

</option>

<?php
}
?>

</select>

<br>

<label>Healthcare Staff</label>

<input
type="text"
name="staff_name"
class="form-control"
required>

<br>

<label>Date</label>

<input
type="date"
name="appointment_date"
class="form-control"
required>

<br>

<label>Time</label>

<input
type="time"
name="appointment_time"
class="form-control"
required>

<br>

<button
name="submit"
class="btn btn-success">

Create Appointment

</button>

</form>

</div>

</div>
<br>
<?php include("C:/xampp/htdocs/medical_collab_system/includes/footer.php"); ?>
</body>
</html>