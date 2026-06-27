<?php

session_start();

if($_SESSION['role']!="Admin")
{
    header("Location:../access_denied.php");
    exit();
}

require_once("../db_connect.php");

if(isset($_POST['save']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $hashed_password=password_hash(
        $password,
        PASSWORD_DEFAULT
        );

    $role=$_POST['role'];

    $query="INSERT INTO users
    (username,password,role)

    VALUES
('$username','$hashed_password','$role')";

    mysqli_query($conn,$query);

    echo "<div class='alert alert-success'>
    User Added Successfully
    </div>";
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Add User</title>

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

<h2>Create User</h2>

<form method="POST">

<input
type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>

<input
type="text"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<select
name="role"
class="form-control mb-3">

<option>Admin</option>
<option>Doctor</option>
<option>Nurse</option>
<option>Receptionist</option>
<option>Pharmacist</option>
<option>Lab Personnel</option>

</select>

<button
name="save"
class="btn btn-success">

Create User

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