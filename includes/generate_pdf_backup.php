<?php
include './header.php';
require('../../assests/fpdf/fpdf.php');


$pdf = new FPDF ('p','mm','A4');

$pdf->Addpage();

//Image

$pdf->Image('logo.png',10,10,30);
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width, height, text, border, end line, align)
$pdf->Cell(130 , 5,'Entreprise nom',1,0);
$pdf->Cell(59  , 5,'Facture',1,1); //end line

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 , 5,'[Street adresse]',1,0);
$pdf->Cell(59  , 5,'',1,1);

$pdf->Cell(130 , 5,'[City,Country,zip ]',1,0);
$pdf->Cell(25  , 5,'Date em',1,1);
$pdf->Cell(34  , 5,'[dd/mm/yyy]',1,1);

$pdf->Cell(130 , 5,'Phone [+123456789]',1,0);
$pdf->Cell(25  , 5,'Invoice #',1,1);
$pdf->Cell(34  , 5,'[KDJF-132]',1,1);

$pdf->Cell(130 , 5,'Phone [+123456789]',1,0);
$pdf->Cell(25  , 5,'Invoice #',1,1);
$pdf->Cell(34  , 5,'[KDJF-132]',1,1);

$pdf->Cell(130 , 5,'FAX [+123456789]',1,0);
$pdf->Cell(25  , 5,'Customer ID #',1,1);
$pdf->Cell(34  , 5,'[123]',1,1);

//empty cell vertical spacer
$pdf->Cell(189  , 10,'',1,1);

//billing adresse
$pdf->Cell(100  , 5,'Bill to',1,1);

$pdf->Cell(10  , 5,'',1,0);
$pdf->Cell(90  , 5,'[Name]',1,1);

$pdf->Cell(10  , 5,'',1,0);
$pdf->Cell(90  , 5,'[Company Name]',1,1);

$pdf->Cell(10  , 5,'',1,0);
$pdf->Cell(90  , 5,'[Adress]',1,1);

$pdf->Cell(10  , 5,'',1,0);
$pdf->Cell(90  , 5,'[Phone]',1,1);

//empty cell vertical spacer
$pdf->Cell(189  , 10,'',1,1);

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130  , 5,'Description',1,0);
$pdf->Cell(25   , 5,'Taxable',1,0);
$pdf->Cell(34   , 5,'Amount',1,1);

$pdf->SetFont('Arial','',12);
//Number of the invoice
$pdf->Cell(130  , 5,'Ultra fridge',1,0);
$pdf->Cell(25   , 5,'-',1,0);
$pdf->Cell(34   , 5,'3,250',1,1,'R');

$pdf->Cell(130  , 5,'Super microwave',1,0);
$pdf->Cell(25   , 5,'-',1,0);
$pdf->Cell(34   , 5,'1,500',1,1,'R');

$pdf->Cell(130  , 5,'Picture',1,0);
$pdf->Cell(25   , 5,'-',1,0);
$pdf->Cell(34   , 5,'750',1,1,'R');

$pdf->Cell(130  , 5,'Test',1,0);
$pdf->Cell(25   , 5,'-',1,0);
$pdf->Cell(34   , 5,'987',1,1,'R');


//Summary
$pdf->Cell(130  , 5,'',1,0);
$pdf->Cell(25   , 5,'HTC',1,0);
$pdf->Cell(4    , 5,'$',1,0);
$pdf->Cell(30   , 5,'5200',1,1,'R');

$pdf->Cell(130  , 5,'',1,0);
$pdf->Cell(25   , 5,'TVA',1,0);
$pdf->Cell(4    , 5,'',1,0);
$pdf->Cell(30   , 5,'20%',1,1,'R');

$pdf->Cell(130  , 5,'',1,0);
$pdf->Cell(25   , 5,'TVA',1,0);
$pdf->Cell(4    , 5,'$',1,0);
$pdf->Cell(30   , 5,'300',1,1,'R');

$pdf->Cell(130  , 5,'',1,0);
$pdf->Cell(25   , 5,'TTC',1,0);
$pdf->Cell(4    , 5,'$',1,0);
$pdf->Cell(30   , 5,'5500',1,1,'R');

$pdf->Output();
?>


