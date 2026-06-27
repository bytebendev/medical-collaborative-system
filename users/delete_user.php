<?php

session_start();

if($_SESSION['role']!="Admin")
{
    header("Location:../access_denied.php");
    exit();
}

require_once("../db_connect.php");

$id=$_GET['id'];

$query="DELETE FROM users
WHERE id='$id'";

mysqli_query($conn,$query);

header("Location:view_users.php");

?>