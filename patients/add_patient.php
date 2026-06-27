<?php

session_start();

include("../config/db.php");

if(!isset($_SESSION['username'])){

header("Location:../login.php");
exit();

}

if(isset($_POST['submit'])){

$name=$_POST['fullname'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$sql="INSERT INTO patients
(fullname,gender,phone,address)

VALUES

('$name','$gender','$phone','$address')";

if(mysqli_query($conn,$sql)){

$msg="Patient Registered Successfully";

}else{

$msg="Error";

}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Add Patient</title>

</head>

<body>

<h2>Patient Registration</h2>

<?php
if(isset($msg)){
echo $msg;
}
?>

<form method="POST">

Full Name:

<input type="text"
name="fullname"
required>

<br><br>

Gender:

<select name="gender">

<option>Male</option>

<option>Female</option>

</select>

<br><br>

Phone:

<input
type="text"
name="phone">

<br><br>

Address:

<textarea
name="address"></textarea>

<br><br>

<input
type="submit"
name="submit"
value="Save">

</form>

<br>

<a href="../dashboard.php">
Back
</a>

</body>
</html>