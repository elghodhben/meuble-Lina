<?php
include('connect.php');

if(isset($_POST['annee']) || isset($_POST['trimestre']))
{
require('fpdf/fpdf.php');


$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','UI','12');
$pdf->Image('images/sigle-fond.jpg','24','70','166','160','jpg');
$pdf->Text(70,20,utf8_decode('RelevÃ© trimestriel de l\'annÃ©e '.$_POST['annee'].' trimestre nÂ° '.$_POST['trimestre']));
$sql = "SELECT * FROM ventes WHERE annee = ".$_POST['annee']." AND trimestre = ".$_POST['trimestre']." ORDER BY date";

$query = mysql_query($sql);

define('EURO', chr(128));

$pdf->SetFont('Arial','B','12');
$pdf->SetXY(20,25);
$pdf->Cell(30,7,utf8_decode('Date'),'1',0);
$pdf->Cell(25,7,utf8_decode('HTVA 6%'),'1',0);
$pdf->Cell(25,7,utf8_decode('TVA 6%'),'1',0);
$pdf->Cell(25,7,utf8_decode('TVAC 6%'),'1',0);
$pdf->Cell(25,7,utf8_decode('HTVA 21%'),'1',0);
$pdf->Cell(25,7,utf8_decode('TVA 21%'),'1',0);
$pdf->Cell(25,7,utf8_decode('TVAC 21%'),'1',0);

$pdf->SetFont('Arial','','12');
$i = 1;
while($donnees = mysql_fetch_array($query))
{
$tva6 = 0.06*$donnees['montant6'];
$tva21 = 0.21*$donnees['montant21'];
$tot6 = $donnees['montant6']-$tva6;
$tot21 = $donnees['montant21']-$tva21;
$tothtva = $tothtva + $tot6 + $tot21;
$tottva = $tottva + $tva6 + $tva21;
$TOTtva6 = $TOTtva6 + $tva6;
$TOTtva21 = $TOTtva21 + $tva21;
$TOT6 = $TOT6 + $tot6;
$TOT21 = $TOT21 + $tot21;
$total6 = $tot6 + $tva6;
$total21 = $tot21 + $tva21;
$total = $total + $total6 + $total21;
$date = preg_replace('#(.+)\/(.+)\/(.+)#','$2/$1/$3',$donnees['date']);
$pdf->SetXY(20,25+$i*7);
$pdf->Cell(30,7,utf8_decode($date),'1',0);
$pdf->Cell(25,7,utf8_decode($tot6.EURO),'1',0);
$pdf->Cell(25,7,utf8_decode($tva6.EURO),'1',0);
$pdf->Cell(25,7,utf8_decode($total6.EURO),'1',0);
$pdf->Cell(25,7,utf8_decode($tot21.EURO),'1',0);
$pdf->Cell(25,7,utf8_decode($tva21.EURO),'1',0);
$pdf->Cell(25,7,utf8_decode($total21.EURO),'1',0);
$i++;
if($i == 34)
{
$pdf->AddPage();
$i = 0;
}
}
$TOTAL6 = $TOT6+$TOTtva6;
$TOTAL21 = $TOT21+$TOTtva21;
$pdf->SetFont('Arial','I','12');
$pdf->Text(10,270,'Total HTVA 6%: '.$TOT6.EURO);
$pdf->Text(80,270,'Total TVA 6%: '.$TOTtva6.EURO);
$pdf->Text(140,270,'Total TVAC 6%: '.$TOTAL6.EURO);
$pdf->Text(10,277,'Total HTVA 21%: '.$TOT21.EURO);
$pdf->Text(80,277,'Total TVA 21%: '.$TOTtva21.EURO);
$pdf->Text(140,277,'Total TVAC 21%: '.$TOTAL21.EURO);
$pdf->SetFont('Arial','BI','14');
$pdf->Text(10,285,'Total HTVA: '.$tothtva.EURO);
$pdf->Text(80,285,'Total TVA: '.$tottva.EURO);
$pdf->Text(140,285,'Total TVAC: '.$total.EURO);

$pdf->Output("pdf/relevetrimestriel".$_POST['annee'].'trim'.$_POST['trimestre'].".pdf",'F');

echo "<a href=\"pdf/relevetrimestriel".$_POST['annee'].'trim'.$_POST['trimestre'].".pdf\">relev&eacute; trimestriel de ".$_POST['annee'].' trimestre '.$_POST['trimestre']."</a>";
}
?>
<h3>Cr&eacute;ation du relev&eacute; trimestriel</h3>
<table>
<form action="index.php?page=viewventes" method="POST">
<tr><td>Ann&eacute;e:</td><td><input type="text" name="annee"></td></tr>
<tr><td>Trimestre (1,2,3,4) : </td><td><input type="text" name="trimestre"></td></tr>
<tr><td><input type="submit" value="G&eacute;n&eacute;rer le relev&eacute; trimestriel"></td></tr>
</form>
</table>
