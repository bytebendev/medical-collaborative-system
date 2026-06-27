<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location:../login.php");
    exit();
}

require_once("../db_connect.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $query =
    "DELETE FROM patients
    WHERE patient_id='$id'";

    mysqli_query($conn,$query);
}

header("Location:view_patients.php");

exit();

?>