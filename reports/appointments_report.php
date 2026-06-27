<?php

require('../fpdf/fpdf.php');
require_once('../db_connect.php');

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(
190,
10,
'APPOINTMENTS REPORT',
0,
1,
'C'
);

$pdf->Ln();

$pdf->SetFont('Arial','B',12);

$pdf->Cell(30,10,'ID',1);
$pdf->Cell(30,10,'Patient',1);
$pdf->Cell(50,10,'Staff name',1);
$pdf->Cell(50,10,'Date',1);

$pdf->Ln();

$query="SELECT * FROM appointments";

$result=mysqli_query($conn,$query);

$pdf->SetFont('Arial','',11);

while($row=mysqli_fetch_assoc($result))
{
    $pdf->Cell(30,10,$row['appointment_id'],1);
    $pdf->Cell(30,10,$row['patient_id'],1);
    $pdf->Cell(50,10,$row['staff_name'],1);
    $pdf->Cell(50,10,$row['appointment_date'],1);

    $pdf->Ln();
}

$pdf->Output();

?>