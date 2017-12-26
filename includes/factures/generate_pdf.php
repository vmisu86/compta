<?php
include '../../includes/db_connect.php';
require('../../assests/fpdf/fpdf.php');


if(isset($_GET['generate_pdf_clint_id'])){

    $the_facture_cl_id = $_GET['generate_pdf_clint_id'];
}
class PDF extends FPDF
{
function Header()
{
    // Logo
    $this->Image('logo.png',10,10,30);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'FACTURE',0,0,'C');
    // Line break
    $this->Ln(30);
}
    function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}

$pdf = new PDF ('p','mm','A4');

$pdf->AliasNbPages();
$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width, height, text, border, end line, align)

$pdf->Cell(100 , 5,'NetSpace',0,0);
$pdf->Cell(49  , 5,'Facture details',0,1); //end line

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',12);

$query = "SELECT * FROM factures_cl LEFT JOIN clients ON factures_cl.facture_cl_client_id =	clients.client_id WHERE facture_cl_id={$the_facture_cl_id}";
$select_query = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_query)){
    $facture_date_em = $row['facture_cl_date_em'];
    $facture_date_rec = $row['facture_cl_date_rec'];
    $facture_cl_ref = $row['facture_cl_ref'];
    $facture_cl_client_id = $row['facture_cl_client_id'];
    $facture_cl_total_HT = $row['facture_cl_total_HT'];
    $facture_cl_mont_TVA = $row['facture_cl_mont_TVA'];
    $facture_cl_total_TTC = $row['facture_cl_total_TTC'];

    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $phone = $row['phone'];
    $email = $row['email'];
    $adresse = $row['adresse'];


}

$pdf->Cell(130 , 5,'37/41 Bd Dubouchage',0,0);
$pdf->Cell(59  , 5,'',0,1);

$pdf->Cell(130 , 5,'06000 NICE - FRANCE',0,0);
$pdf->Cell(59  , 5,'Date envoi: '.$facture_date_em,0,1);
$pdf->Cell(34  , 5,'',0,1);

$pdf->Cell(130 , 5,'Phone +33 493 448 590',0,0);
$pdf->Cell(59  , 5,'Date recover: '.$facture_date_rec,0,1);
$pdf->Cell(34  , 5,'',0,1);

$pdf->Cell(130 , 5,'Fax : +33 493 448 593',0,0);
$pdf->Cell(59  , 5,'Ref: '.$facture_cl_ref,0,1);
$pdf->Cell(34  , 5,'',0,1);

$pdf->Cell(130 , 5,'',0,0);
$pdf->Cell(59  , 5,'Client ID: '.$facture_cl_client_id,0,1);
$pdf->Cell(34  , 5,'',0,1);

//empty cell vertical spacer
$pdf->Cell(189  , 10,'',0,1);


//billing adresse
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100  , 5,'Facture a',0,1);


$pdf->SetFont('Arial','',12);
$pdf->Cell(10  , 5,'',0,0);
$pdf->Cell(90  , 5,$prenom.' '.$nom,0,1);

$pdf->Cell(10  , 5,'',0,0);
$pdf->Cell(90  , 5,$phone,0,1);

$pdf->Cell(10  , 5,'',0,0);
$pdf->Cell(90  , 5,$email,0,1);

$pdf->Cell(10  , 5,'',0,0);
$pdf->Cell(90  , 5,$adresse,0,1);

//empty cell vertical spacer
$pdf->Cell(189  , 10,'',0,1);

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(90   , 5,'Description',1,0);
$pdf->Cell(33   , 5,'Quantite',1,0);
$pdf->Cell(33   , 5,'Prix HT',1,0);
$pdf->Cell(33   , 5,'Total HT',1,1);

$pdf->SetFont('Arial','',12);
//Number of the invoice

$query2 = "SELECT * FROM factures_cl LEFT JOIN commande_client ON factures_cl.facture_cl_id = commande_client.facture_cl_id WHERE commande_client.facture_cl_id = {$the_facture_cl_id}";
$select_query = mysqli_query($connection,$query2);
while($row = mysqli_fetch_assoc($select_query)){

$pdf->Cell(90   , 5,$row['produit_appellation'],1,0);
$pdf->Cell(33   , 5,$row['commande_produit_quantite'],1,0);
$pdf->Cell(33   , 5,$row['commande_produit_prix'],1,0);
$pdf->Cell(33   , 5,$row['commande_produit_actual_montant'],1,1,'R');

}
//empty cell vertical spacer
$pdf->Cell(189  , 10,'',0,1);
//Summary
$pdf->Cell(122  , 5,'',0,0);
$pdf->Cell(33   , 5,'Total HTC',1,0);
$pdf->Cell(4    , 5,'$',1,0);
$pdf->Cell(30   , 5,$facture_cl_total_HT,1,1,'R');

$pdf->Cell(122  , 5,'',0,0);
$pdf->Cell(33   , 5,'TVA',1,0);
$pdf->Cell(4    , 5,'',1,0);
$pdf->Cell(30   , 5,'20%',1,1,'R');

$pdf->Cell(122  , 5,'',0,0);
$pdf->Cell(33   , 5,'Montant TVA',1,0);
$pdf->Cell(4    , 5,'$',1,0);
$pdf->Cell(30   , 5,$facture_cl_mont_TVA,1,1,'R');

$pdf->Cell(122  , 5,'',0,0);
$pdf->Cell(33   , 5,'TTC',1,0);
$pdf->Cell(4    , 5,'$',1,0);
$pdf->Cell(30   , 5,$facture_cl_total_TTC,1,1,'R');



$pdf->Output();

?>
