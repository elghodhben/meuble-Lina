<?php
ob_start();
//client et en-tÃ¨te
?>
<table><tr>
<td width='200'><img src='../web/images/logo1.jpg' width='160' height='150'></td>
<td width='230'>A.B.Vins'Amour<br>sur l'agaux 124<br>B-4651 Herve<br>GSM: 0495/32.86.22<br>BCE 0774.124.732</td>
<td width='200'>
<?php
include('connect.php');

$query = ('SELECT * FROM commande WHERE id_commande ='.$_GET['id_commande']);

$reponce = mysql_query($query);

$donnees = mysql_fetch_array($reponce)

?>

<?php echo $donnees['nom_client']; ?><br>
<?php echo $donnees['ville']; ?><br>
<?php echo $donnees['cite']; ?><br>
<?php echo $donnees['livraison']; ?><br>
<?php $mail =  $donnees['cin']; ?><br>
</td></tr></table>
<?php 
$client = array($donnees['nom_client'], $donnees['ville'], $donnees['cite'], $donnees['livraison']);
$id_personne = $donnees['cin'];
$type = $_POST['choix'];
?>

<table>
<tr><td width='400'> nÂ°

<?php

$sql1 = ('SELECT COUNT(*) AS nb FROM commande where id_commande='.$_GET['id_commande'] );
$retour1 = mysql_query($sql1);
$donnees1 = mysql_fetch_array($retour1);
 
$shuffled = date('y').'-'.$donnees1['nb'] ;
echo $shuffled;

?>


</td><td><?php include('forme/date.php'); ?></td></tr>
</table>
<!-- contenu de la page tableau etc... -->

<?php
$retour = 'SELECT * FROM commande WHERE id_commande ='.$_GET['id_commande'];
$donnees1 = mysql_query($retour);

?>
<table border='1'>
<tr><th width='200'> D&eacute;nomination </th><th width='100'> Prix unitaire </th><th width='100'> Quantit&eacute; </th><th width='100'> Taux TVA </th><th width='100'> Prix HTVA </th></tr>
<?php
while( $donnees = mysql_fetch_array($donnees1))
{
echo '<tr><td>';
echo $donnees['nom_art'];
echo '</td><td>';
echo $donnees['prix'];
echo '</td><td>';
$prix = $donnees['prix'] * $donnees['quantite_art'];
echo '</td><td>';
echo $donnees['quantite_art'] . '%';
echo '</td><td>';
echo round($prix, 2) . '&Dinar;';
echo '</td></tr>';

$tot = $tot + $prix;
}
?>
</table>
<table><tr><td width='400'></td><td><b>TOTAL HTVA: <?php echo number_format($tot, 2) . '&euro;'; ?></b></td></tr></table>

<!-- tableau TVA -->

<?php
$retour = mysql_query('SELECT COUNT(*) AS nb FROM article');
$donnees2 = mysql_fetch_array($retour);

$i2 = $donnees2['nb'];
$i = 0;
$tot6 = 0;
$tot21 = 0;
$tot = 0;
$total6 = 0;
$total21 = 0;
$TVA6 = 0;
$TVA21 = 0;
$TVA = 0;
$total = 0;
?>

<?php

$retour = 'SELECT * FROM article';
$donnees1 = mysql_query($retour);
$donnees = mysql_fetch_array($donnees1);
$tot6 = $tot6 + ($donnees['prix_art'] *$donnees['nbr_art']);
$tot21 = $tot21 + ($donnees['prix_art'] * $donnees['nbr_art']);

$TVA6 = $tot6 * 0.06;
$TVA21 = $tot21 * 0.21;
$TVA = $TVA6 + $TVA21;

$total6 = $TVA6 + $tot6;
$total21 = $TVA21 + $tot21;

$tot = $tot6 + $tot21;

$total = $total6 + $total21;
?>

<table border='1'>
<tr><th width='100'></th><th width='100'>TVA 6%</th><th width='100'>TVA 21%</th><th width='100'>TOTAL</th></tr>
<tr><th>Prix HTVA</th><td><?php echo round($tot6,2) ; ?></td><td><?php echo round($tot21,2) ; ?></td><td><?php echo round($tot, 2) .' &euro;'; ?></td></tr>
<tr><th>TVA</th><td><?php echo round($TVA6,2); ?></td><td><?php echo round($TVA21,2) ; ?></td><td><?php echo round($TVA, 2) .' &euro;'; ?></td></tr>
<tr><th>Total</th><td><?php echo round($total6,2); ?></td><td><?php echo round($total21,2); ?></td><td><b><?php echo round($total, 3) .' &euro;'; ?></b></td></tr>
</table>
<p>
Dexia: 792-5772646-34
</p>


<?php
$out = ob_get_contents();
ob_end_clean();

include('text/generation_pdf.php');
echo $out;
$query = "INSERT INTO historique VALUES ('', '$shuffled', '$total', '$id_personne', '0', '$type', '$date', ".date('Y').")";
if(mysql_query($query))
{
echo 'enregistrement bien effectu&eacute;<br>';
}
else
{
echo 'erreur lors de l\'enregistrement<br>';
}


$query = '';
$donnees = '';

include('connect.php');


$file = fopen('facture/'.$shuffled.'.txt','a+');

$ecrire = fputs($file, "<div id=fr>".$out."</div>");

if($ecrire)
{
echo 'enregistrement bien effectu&eacute;';
}
else
{
echo 'erreur lors de l\'enregistrement';
}
?>
<script src='renvoie.js' language='javascript' type='text/javascript'></script>
<input type='button' value="Envoyer la facture" onClick="renvoie('<?php echo $shuffled; ?>','<?php echo $mail; ?>')" />

