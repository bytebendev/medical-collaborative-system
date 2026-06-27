<?php

require_once("../db_connect.php");

if(isset($_POST['id']) && isset($_POST['status']))
{
    $id = $_POST['id'];
    $status = $_POST['status'];

    $query = "
    UPDATE appointments
    SET status='$status'
    WHERE appointment_id='$id'
    ";

    if(mysqli_query($conn, $query))
    {
        header("Location:view_appointments.php");
        exit();
    }
    else
    {
        echo "Database Error: " . mysqli_error($conn);
    }
}
else
{
    echo "Invalid Request";
}

?>