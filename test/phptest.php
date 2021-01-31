
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

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('./logo/logo.JPG',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Menu',1,0,'C');
    $this->Cell(60,10,'DATE:'.date("Y/m/d"),0,0,'R');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

	$pdf = new PDF_Chinese();
    $pdf->AddGBFont('simhei', '黑体');
    $pdf->AddPage();
    $pdf->SetFont('simhei', '', 13);

    //自动换行
    $pdf->MultiCell(180,10,iconv("utf-8","gbk","中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行"));

    //显示一格
    $pdf->Cell(40,10,iconv("utf-8","gbk","第一个单元格"));
    $pdf->Ln();//换行
    $pdf->Cell(40,10,iconv("utf-8","gbk","第二个单元格"));
    $pdf->Ln();//换行

    //输出表格
    //Cell方法最后一个参数表示是否显示边框
    $pdf->Cell(60,10,iconv("utf-8","gbk","姓名"),1);
    $pdf->Cell(60,10,iconv("utf-8","gbk","性别"),1);
    $pdf->Ln();
    $pdf->Cell(60,10,iconv("utf-8","gbk","张三"),1);
    $pdf->Cell(60,10,iconv("utf-8","gbk","男"),1);
    $pdf->Ln();
    $pdf->Cell(60,10,iconv("utf-8","gbk","李四"),1);
    $pdf->Cell(60,10,iconv("utf-8","gbk","女"),1);
    $pdf->Ln();

    $pdf->Cell(60,10,'YOUR FOOD:',0,1);
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
    $pdf->Cell(50,10,iconv('UTF-8','gbk',$row['foodcn'].'你哈珀'),1,0,'L');
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(50,10,'RM'.$row['fooden'],1,0,'L');
    $pdf->Cell(30,10,$row['price'],1,1,'C');
    $no++;
}

    //插入图片
    //Image参数：文件，x坐标，y坐标，宽，高
    $pdf->Image('./logo/logo.JPG',null,null,50,50);
    $pdf->AliasNbPages();

    $pdf->Output();//直接输出，即在浏览器显示
    //$pdf->Output('example.pdf','F');//保存为example.pdf文件