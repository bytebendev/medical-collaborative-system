<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in AND is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Adjust this relative path depending on where your access_denied.php file is stored
    header("Location: /medical_collab_system/access_denied.php");
    exit();
}

require('../fpdf/fpdf.php');
require_once('../db_connect.php');

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(
190,
10,
'USERS REPORT',
0,
1,
'C'
);

$pdf->Ln();

$pdf->SetFont('Arial','B',12);

$pdf->Cell(30,10,'ID',1);
$pdf->Cell(80,10,'Name',1);
$pdf->Cell(50,10,'Role',1);

$pdf->Ln();

$query="SELECT * FROM users";

$result=mysqli_query($conn,$query);

$pdf->SetFont('Arial','',11);

while($row=mysqli_fetch_assoc($result))
{
    $pdf->Cell(30,10,$row['id'],1);
    $pdf->Cell(80,10,$row['username'],1);
    $pdf->Cell(50,10,$row['role'],1);

    $pdf->Ln();
}

$pdf->Output();

?>