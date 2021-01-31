<?php

session_start();
require('./fpdf/chinese.php');

$con = mysqli_connect('localhost','root','1234','bbq');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT*FROM food ";
$result=mysqli_query($con,$sql);
//mysqli_select_db($con,"demo");

$pdf = new PDF_Chinese();
$pdf->AddGBFont('simhei', '黑体');
$pdf->AddPage();


//set font for the entire document
$pdf->SetFont('Arial','B',16);
$pdf->Cell(60,10,'YOUR FOOD:',0,1);
$pdf->Cell(80);
// Title
$pdf->SetFont('simhei', '', 13);
$pdf->Cell(30,10,iconv('UTF-8','gbk','串串'),1,0,'C');
$pdf->Ln();//换行

$pdf->Cell(20);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(15,10,'No.',1,0,'C');
//$pdf->Cell(20,10,'Image',1,0,'C');
$pdf->Cell(50,10,'Food Name(Cn)',1,0,'C');
$pdf->Cell(50,10,'Food Name(En)',1,0,'C');
$pdf->Cell(30,10,'Price',1,1,'C');
$no=1;
while($row=mysqli_fetch_array($result))
{
    //$pdf->Cell(60,10,$row['username'],1,0,'C');
    //$pdf->Cell(80,10,$row['email'],1,0,'C');
    //$pdf->Cell(40,10,$row['phone'],1,1,'C');
    $pdf->Cell(20);
    $pdf->Cell(15,10,$no,1,0,'C');
    //$pdf->Cell(20,10,'Image',1,0,'C');
    $pdf->SetFont('simhei', '', 13);
    $pdf->Cell(50,10,iconv('UTF-8','gbk',$row['foodcn']),1,0,'L');
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(50,10,$row['fooden'],1,0,'L');
    $pdf->Cell(30,10,'RM'.$row['price'],1,1,'C');
    $no++;
}

$pdf->AliasNbPages();
$pdf->Ln();//换行

//$pdf->Cell(30,10,'Sign:____________',0,1);
$pdf->Output();

?>