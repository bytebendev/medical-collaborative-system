<?php

session_start();

if(!isset($_SESSION['username'])){

header("Location:login.php");

exit();

}
?>

<?php
require_once __DIR__ . "/db_connect.php";


if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    $sql="INSERT INTO patients
    (full_name,gender,phone,address)
    VALUES
    ('$name','$gender','$phone','$address')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Patient Registered Successfully')</script>";
    }else{
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Patient Registration</title>


<link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<?php include("includes/sidebar.php"); ?>

<div style="margin-left:250px;">

<div class="container mt-5">

<h2>Register Patient</h2>

<form method="POST">

<label>Name</label>

<input type="text"
name="name"
class="form-control"
required>

<br>

<label>Gender</label>

<select name="gender"
class="form-control">

<option>Male</option>
<option>Female</option>

</select>

<br>

<label>Phone</label>

<input type="text"
name="phone"
class="form-control">

<br>

<label>Address</label>

<textarea
name="address"
class="form-control">
</textarea>

<br>

<button
name="submit"
class="btn btn-success">

Register

</button>

</form>

</div>

</div>
<br>
<?php include("../medical_collab_system/includes/footer.php"); ?>

</body>
</html>