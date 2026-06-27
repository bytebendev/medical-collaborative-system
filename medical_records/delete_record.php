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

    mysqli_query(
    $conn,
    "DELETE FROM medical_records
    WHERE record_id='$id'"
    );
}

header("Location:view_records.php");

exit();

?>