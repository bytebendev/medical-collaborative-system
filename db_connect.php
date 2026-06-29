<?php

$servername = "sql103.infinityfree.com";
$username = "if0_42296947";
$password = "8sOSuypqUU";
$database = "if0_42296947_medical_collab_db";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>
