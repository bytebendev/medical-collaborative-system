<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location:../login.php");
    exit();
}

require_once("../db_connect.php");

$id = $_GET['id'];

$query =
"SELECT * FROM patients
WHERE patient_id='$id'";

$result =
mysqli_query($conn,$query);

$row =
mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $fullname =
    $_POST['fullname'];

    $gender =
    $_POST['gender'];

    $phone =
    $_POST['phone'];

    $address =
    $_POST['address'];

    $update =
    "UPDATE patients SET

    full_name='$fullname',
    gender='$gender',
    phone='$phone',
    address='$address'

    WHERE patient_id='$id'";

    mysqli_query($conn,$update);

    header(
    "Location:view_patients.php"
    );

    exit();
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Patient</title>

<link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">

    <style>
     footer {
            background: #800020;
            color: #ffffff;
            padding: 30px 15px;
            text-align: center;
            margin-top: auto;
        }
        
        footer .project-subtitle {
            color: #ffc107;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 5px;
        }
    </style>

</head>

<body>

<div class="container mt-5">

<h2>Edit Patient</h2>

<form method="POST">

<label>Full Name</label>

<input
type="text"
name="fullname"
class="form-control"
value="<?php echo $row['full_name']; ?>"
required>

<br>

<label>Gender</label>

<select
name="gender"
class="form-control">

<option
value="Male"
<?php if($row['gender']=="Male") echo "selected"; ?>>

Male

</option>

<option
value="Female"
<?php if($row['gender']=="Female") echo "selected"; ?>>

Female

</option>

</select>

<br>

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?php echo $row['phone']; ?>"
required>

<br>

<label>Address</label>

<textarea
name="address"
class="form-control"><?php echo $row['address']; ?></textarea>

<br>

<button
name="update"
class="btn btn-success">

Update Patient

</button>

</form>

</div>
<br><br>
<footer>
        <div class="container">
            <p class="mb-0 text-white-50 small">&copy; <?php echo date("Y"); ?> Medical Collaborative System. All Rights Reserved.</p>
            <li class="list-inline-item"><div class="project-subtitle"> 400 Level Group 29 Project 
                        <a href="/medical_collab_system/dashboard.php" class="text-white-50 text-decoration-none text-hover-gold">Dashboard</a>
                    </div></li>
            
        </div>
    </footer>


</body>

</html>