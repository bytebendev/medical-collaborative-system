<?php

$host="localhost";
$user="root";
$password="";
$dbname="medical_collab_db";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $dbname
);

if(!$conn){

die("Connection Failed");

}

?>