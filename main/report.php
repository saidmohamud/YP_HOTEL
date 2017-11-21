<?php
require('fpdf.php');
$conn = new mysqli("localhost", "root", "", "simpledata");
$output="";
$sql = 'SELCT * FROM roomno';
$result = mysqli_query($conn, $sql);
$pdf = new FPDF();
$pdf->AddPage ();
$pdf->SetFont("Arial");
$pdf->SetTextColor(255,0,0);
$pdf->SetFillColor(0,255,0);
$pdf->Cell(0,10,"HOTEL YAAZMIN PLAZA",1,1'C',true);
$pdf->Cell(0,10,"",0,1,"C");
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(150,150,150);
$pdf->Cell(0,10,"GUEST INFORMATION",1,1,'C'true);
$pdf->output();
?>