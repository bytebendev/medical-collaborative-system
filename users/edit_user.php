<?php

session_start();
if($_SESSION['role']!="Admin")
{
    header("Location:../access_denied.php");
    exit();
}
require_once("../db_connect.php");



// 1. If no ID is passed, stop
$id = $_GET['id'] ?? null;

if (!$id) {
    // Instead of dying, send them back to the list
    header("Location: view_users.php");
    exit();
}


$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);

// 2. Fetch the row
$row = mysqli_fetch_assoc($result);

// 3. If no row was found, stop
if (!$row) {
    die("User not found.");
}

if(isset($_POST['update']))
{
    $username=$_POST['username'];
    $role=$_POST['role'];

    $update="UPDATE users SET

    username='$username',
    role='$role'

    WHERE id='$id'";

    mysqli_query($conn,$update);

    header("Location:view_users.php");
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Edit User</title>

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

<h2>Edit User</h2>

<form method="POST">

<input
type="text"
name="username"
value="<?php echo $row['username']; ?>"
class="form-control mb-3">

<select name="role" class="form-control mb-3">
    <?php
    $roles = ['Admin', 'Doctor', 'Nurse', 'Receptionist', 'Pharmacist', 'Lab Personnel'];
    foreach ($roles as $r) {
        // If the role matches the database, mark it as 'selected'
        $selected = ($row['role'] == $r) ? 'selected' : '';
        echo "<option value='$r' $selected>$r</option>";
    }
    ?>
</select>
<button
name="update"
class="btn btn-success">

Update User

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