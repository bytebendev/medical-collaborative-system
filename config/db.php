<?php

$host = "sql103.infinityfree.com";
$user = "if0_42296947";
$password = "8sOSuypqUU";
$dbname = "if0_42296947_medical_collab_db";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $dbname
);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>
