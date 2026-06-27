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
referrals.*,
patients.full_name

FROM referrals

JOIN patients

ON referrals.patient_id=
patients.patient_id";

$result=mysqli_query(
$conn,
$query
);

?>

<?php include("../includes/sidebar.php"); ?>

<!DOCTYPE html>
<html>

<head>

<title>View Referrals</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div style="margin-left:250px;">

<div class="container mt-5">

<h2>Referral History</h2>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Patient</th>
<th>Hospital</th>
<th>Referral Note</th>
<th>Date</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['referral_id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['referred_to']; ?></td>

<td><?php echo $row['referral_note']; ?></td>

<td><?php echo $row['date_created']; ?></td>

</tr>

<?php
}
?>

</table>

</div>
</div>

<?php include("../includes/footer.php"); ?>

</body>
</html>