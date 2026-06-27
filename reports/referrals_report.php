<?php

require('../fpdf/fpdf.php');
require_once('../db_connect.php');

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(
190,
10,
'REFERRALS REPORT',
0,
1,
'C'
);

$pdf->Ln();

$pdf->SetFont('Arial','B',12);

$pdf->Cell(20,10,'ID',1);
$pdf->Cell(30,10,'Patient ID',1);
$pdf->Cell(100,10,'Note',1);
$pdf->Cell(30,10,'Referred To',1);

$pdf->Ln();

$query="SELECT * FROM referrals";

$result=mysqli_query($conn,$query);

$pdf->SetFont('Arial','',11);

while($row=mysqli_fetch_assoc($result))
{
    $pdf->Cell(20,10,$row['referral_id'],1);
    $pdf->Cell(30,10,$row['patient_id'],1);
    $pdf->Cell(100,10,$row['referral_note'],1);
    $pdf->Cell(30,10,$row['referred_to'],1);

    $pdf->Ln();
}

$pdf->Output();

?>