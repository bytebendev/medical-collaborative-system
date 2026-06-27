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
    $diagnosis=$_POST['diagnosis'];
    $treatment=$_POST['treatment'];

    $sql="INSERT INTO medical_records
    (patient_id,diagnosis,treatment)

    VALUES

    ('$patient',
    '$diagnosis',
    '$treatment')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Record Saved Successfully')
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

<title>Add Record</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<?php include("../includes/sidebar.php"); ?>

<div style="margin-left:250px;">

<div class="container mt-5">

<h2>Add Medical Record</h2>

<form method="POST">

<label>Select Patient</label>

<select
name="patient_id"
class="form-control"
required>

<option value="">
Choose Patient
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

<label>Diagnosis</label>

<textarea
name="diagnosis"
class="form-control"
required></textarea>

<br>

<label>Treatment</label>

<textarea
name="treatment"
class="form-control"
required></textarea>

<br>

<button
name="submit"
class="btn btn-success">

Save Record

</button>

</form>

</div>

</body>
</html>