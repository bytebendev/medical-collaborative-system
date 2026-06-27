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

$hospital=$_POST['referred_to'];

$note=$_POST['referral_note'];

$sql="INSERT INTO referrals
(patient_id,referred_to,referral_note)

VALUES

('$patient',
'$hospital',
'$note')";

if(mysqli_query($conn,$sql))
{

echo "<script>
alert('Referral Created')
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

<?php include("../includes/sidebar.php"); ?>

<!DOCTYPE html>
<html>

<head>

<title>Add Referral</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div style="margin-left:250px;">

<div class="container mt-5">

<h2>Create Referral</h2>

<form method="POST">

<label>Select Patient</label>

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

<label>Referred To</label>

<input
type="text"
name="referred_to"
class="form-control"
placeholder="University College Hospital"
required>

<br>

<label>Referral Note</label>

<textarea
name="referral_note"
class="form-control"
required></textarea>

<br>

<button
name="submit"
class="btn btn-success">

Submit Referral

</button>

</form>

</div>

</div>

<?php include("../includes/footer.php"); ?>

</body>

</html>