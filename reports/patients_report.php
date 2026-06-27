<?php

require('../fpdf/fpdf.php');
require_once('../db_connect.php');

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(
190,
10,
'PATIENTS REPORT',
0,
1,
'C'
);

$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(20,10,'ID',1);
$pdf->Cell(60,10,'Name',1);
$pdf->Cell(30,10,'Gender',1);
$pdf->Cell(40,10,'Phone',1);
$pdf->Ln();

$query="SELECT * FROM patients";

$result=mysqli_query($conn,$query);

$pdf->SetFont('Arial','',11);

while($row=mysqli_fetch_assoc($result))
{
    $pdf->Cell(
    20,10,
    $row['patient_id'],
    1
    );

    $pdf->Cell(
    60,10,
    $row['full_name'],
    1
    );

    $pdf->Cell(
    30,10,
    $row['gender'],
    1
    );

    $pdf->Cell(
    40,10,
    $row['phone'],
    1
    );

    $pdf->Ln();
}

$pdf->Output();

?>