<?php
session_start();
if($_SESSION['role'] != "Admin") {
    header("Location: ../access_denied.php");
    exit();
}
require_once("../db_connect.php");

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


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
    <h2>View & Manage Users</h2>
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo htmlspecialchars($row['role']); ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete User?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
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