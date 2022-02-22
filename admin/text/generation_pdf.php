<?php
require_once('fpdf/fpdf.php');
include('connect.php');

//SÃ©lection de la police
$pdf= new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetCreator('PHP');
$pdf->SetAuthor('William pour A.B.Vins\'Amour');
$pdf->SetSubject('Facture');
$str = utf8_decode(' numÃ©ro '.$shuffled);
$pdf->SetTitle($str);
$pdf->SetFont('Arial','','12');
//sigle de la sociÃ©tÃ©
$pdf->Image('../web/images/logo1.jpg','24','20','43','40','jpg');

//SociÃ©tÃ© et ses coordonnÃ©es
$pdf->Text(70,'30',$varnom);
$pdf->Text('70','36',$varadresse1);
$pdf->Text('70','42',$varadresse2);
$pdf->Text('70','48',$vartelephone);
$pdf->Text('70','54',$vartva);

//coordonnÃ©es du client
$pdf->Text(140,'30',utf8_decode($client['0']));
$pdf->Text(140,'36',utf8_decode($client['1']));
$pdf->Text(140,'42',utf8_decode($client['2']));



//type de document
$str = utf8_decode($shuffled);
$pdf->Text(24,'70',$str);

//date
// On calcule le timestamp correspondant Ã  la date entrÃ©e
    $timestamp = time();
    // On rÃ©cupÃ¨re le numÃ©ro du jour correspondant au timestamp (0, 1, 2, 3...)
    $numero_jour = date('w', $timestamp);
    $numero_mois = date('F', $timestamp);
    
    // On crÃ©e un array pour numÃ©roter les jours (0 => Dimanche, 1 => Lundi...) et les mois en fonctionde leur nom anglais
    $jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $mois = array('January' => "Janvier", 'February' => 'FÃ©vrier', 'March' => 'Mars', 'April' => 'Avril', 'May' => 'Mai', 'June' => "Juin", 'July' => "Juillet", 'August' => "AoÃ»t", 'September' => 'Septembre', 'October' => 'Octobre', 'November' => "Novembre", 'December' => "DÃ©cembre");
    // On rÃ©cupÃ¨re le nom du jour et du mois en franÃ§ais grÃ¢ce aux array(s) qu'on vient de crÃ©er
    $jour = $jours[$numero_jour];
    $moiss = $mois[$numero_mois];

    
    // Puis on affiche le rÃ©sultat
$date = 'Le '.$jour.' '.date('d').' '.$moiss.' '.date('Y');
$str = utf8_decode($date);
$pdf->Text(140,'70',$str);

$pdf->SetXY(24,75);
$str = utf8_decode('Nom article');
$pdf->SetFont('Arial','B','12');
$pdf->Cell(54,10,$str,1,0,'C');
$pdf->Cell(27,10,"Prix Unitaire",1,0,'C');
$pdf->Cell(27,10,utf8_decode("Quantité"),1,0,'C');
$pdf->Cell(27,10,utf8_decode(" livraison"),1,0,'C');
$pdf->SetFont('Arial','','12');

define('EURO', chr(128));
$retour = 'SELECT * FROM commande WHERE id_commande ='.$_GET['id_commande'];
$donnees1 = mysql_query($retour);
$tot = 0;
$i3=1;
while($donnees=mysql_fetch_array($donnees1))
{
$pdf->SetXY(24,78+$i3*7);
$pdf->Cell(54,7,utf8_decode($donnees['nom_art']),1,0);
$pdf->Cell(27,7,utf8_decode($donnees['prix']),1,0);
$prix = $donnees['prix'];
$pdf->Cell(27,7,utf8_decode($donnees['quantite_art']),1,0);
if($donnees['livraison']=="par transporteur")
{
$pdf->Cell(27,7,utf8_decode('50 DT'),1,0);
$tot = $tot + 50;
}
else
{
$pdf->Cell(27,7,utf8_decode('0 DT'),1,0);
}
$pdf->Cell(27,7,utf8_decode(round($prix, 2)),1,2);
$i3++;
$tot = $tot + $prix;
}
$pdf->Text(140,170,utf8_decode('TOTAL HTVA: '.round($tot,3). 'DT'));
$pdf->SetFont('Arial','','14');
$str = utf8_decode("$varbanque Communication:");
$pdf->Text(24,200,$str);
$pdf->SetFont('Arial','I','14');
$str = utf8_decode($client['0'] .' '. $shuffled);
$pdf->Text(120,200,$str);
$pdf->Output("pdf/".$shuffled.".pdf","F");
$pdf->AddPage();

/*
for($i = $i3 ; $i <21 ; $i++)
{
$pdf->SetXY(24,78+$i*7);
$pdf->Cell(54,7,'',1,0,'C');
$pdf->Cell(27,7,"",1,0,'C');
$pdf->Cell(27,7,utf8_decode(""),1,0,'C');
$pdf->Cell(27,7,utf8_decode(""),1,0,'C');
$pdf->Cell(27,7,utf8_decode(""),1,2,'C');
}
*/



echo "<a href=\"pdf/".$shuffled.".pdf\">Pdf de la facture</a>";
?>
