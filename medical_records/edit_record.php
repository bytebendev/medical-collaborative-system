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
"SELECT * FROM medical_records
WHERE record_id='$id'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];

    $update =
    "UPDATE medical_records SET

    diagnosis='$diagnosis',
    treatment='$treatment'

    WHERE record_id='$id'";

    mysqli_query($conn,$update);

    header("Location:view_records.php");
    exit();
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Record</title>

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

<h2>Edit Medical Record</h2>

<form method="POST">

<label>Diagnosis</label>

<textarea
name="diagnosis"
class="form-control"
required><?php echo $row['diagnosis']; ?></textarea>

<br>

<label>Treatment</label>

<textarea
name="treatment"
class="form-control"
required><?php echo $row['treatment']; ?></textarea>

<br>

<button
name="update"
class="btn btn-success">

Update Record

</button>

</form>

</div>
<br>
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