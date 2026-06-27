```php
<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: ../login.php");
    exit();
}

require_once("../db_connect.php");

$search="";

if(isset($_POST['search']))
{
    $search=$_POST['search_text'];

    $query="SELECT * FROM patients
            WHERE full_name LIKE '%$search%'
            OR phone LIKE '%$search%'";
}
else
{
    $query="SELECT * FROM patients";
}

$result=mysqli_query($conn,$query);

?>

<!DOCTYPE html>

<html>

<head>

<title>View Patients</title>

<link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

body{
    background:#f5f5f5;
}

.container-box{
    margin-left:250px;
    padding:20px;
}

</style>

</head>

<body>

<?php include("../includes/sidebar.php"); ?>

<div class="container-box">

<div class="container mt-4">

<h2 class="mb-4">Patient Records</h2>

<form method="POST" class="mb-4">

<div class="row">

<div class="col-md-8">

<input
type="text"
name="search_text"
class="form-control"
placeholder="Search by Name or Phone"
value="<?php echo $search; ?>">

</div>

<div class="col-md-4">

<button
type="submit"
name="search"
class="btn btn-primary w-100">

Search

</button>

</div>

</div>

</form>

<table class="table table-bordered table-striped">

<tr class="table-dark">

<th>ID</th>
<th>Name</th>
<th>Gender</th>
<th>Phone</th>
<th>Address</th>
<th>Actions</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['patient_id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['address']; ?></td>

<td>

<a href="edit_patient.php?id=<?php echo $row['patient_id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<?php

if($_SESSION['role']=="Admin")
{
?>

<?php

if($_SESSION['role']=="Admin")
{
?>

<a
href="delete_patient.php?id=<?php echo $row['patient_id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this patient?');">

Delete

</a>

<?php
}
?>

<?php
}
?>
</td>

</tr>

<?php
}
?>

</table>

</div>

</div>

<br>
<?php include("../includes/footer.php"); ?>

</body>

</html>
```
