<h3>Listing complet des clients et des produits</h3>
<?php
include('connect.php');

require('fpdf/fpdf.php');


//SÃ©lection de la police
$pdf= new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','UB','12');
$pdf->Text(45,20,utf8_decode("Listing de touts les produits prÃ©sent dans la base de donnÃ©es"));
$pdf->Image('images/sigle-fond.jpg','24','70','166','160','jpg');
$i = 0;
$pdf->SetXY(20,25+$i*7);
$pdf->Cell(70,7,utf8_decode('DÃ©nomination'),1,0,'C');
$pdf->Cell(50,7,utf8_decode('Prix'),1,0,'C');
$pdf->Cell(50,7,utf8_decode('TVA'),1,2,'C');

$i = 1;
$pdf->SetFont('Arial','','12');
$sql = "SELECT * FROM fromage ORDER BY nom";
$reponce = mysql_query($sql);


while($donnees = mysql_fetch_array($reponce))
{
$pdf->SetXY(20,25+$i*7);
$pdf->Cell(70,7,$donnees['nom'],1,0);
$pdf->Cell(50,7,$donnees['prix'],1,0);
$pdf->Cell(50,7,$donnees['TVA'].'%',1,2);
$i++;
}
$pdf->Output("pdf/listing-produit.pdf","F");
?>
<a href='pdf/listing-produit.pdf'>Voir le listing g&eacute;n&eacute;r&eacute; des produits</a><br>
<?php
$pdf= new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('images/sigle-fond.jpg','24','70','166','160','jpg');
$pdf->SetFont('Arial','UB','12');
$pdf->Text(45,20,utf8_decode("Listing de touts les clients prÃ©sent dans la base de donnÃ©es"));

$i = 0;
$k = 0;
$pdf->SetFont('Arial','','12');
$sql = "SELECT * FROM client ORDER BY nom";
$reponce = mysql_query($sql);


while($donnees = mysql_fetch_array($reponce))
{
$pdf->SetXY(20+$k*75,25+$i*7*5);
$pdf->Cell(75,7,utf8_decode($donnees['nom']),'LTR',2);
$pdf->Cell(75,7,utf8_decode($donnees['adresse1'].$donnees['adresse2']),'LR',2);
$pdf->Cell(75,7,utf8_decode($donnees['gsm']),'LR',2);
$pdf->Cell(75,7,utf8_decode($donnees['telephone']),'LR',2);
$pdf->Cell(75,7,utf8_decode($donnees['TVA-C']),'LBR');


if($k == 1)
{
$k = 0;
$i++;
}
else
{
$k++;
}
}
$pdf->Output("pdf/listing-client.pdf","F");
?>
<a href='pdf/listing-client.pdf'>Voir le listing g&eacute;n&eacute;r&eacute; des clients</a>


