<?php
include('connect.php');

$query = ('SELECT * FROM client WHERE ID = '.$_GET['id']);

$reponce = mysql_query($query);

while($donnees = mysql_fetch_array($reponce))
{
?>
<table>
<tr><td>
<?php echo $donnees['nom']; ?><br>
<?php echo $donnees['adresse1']; ?><br>
<?php echo $donnees['adresse2']; ?><br>
<?php echo $donnees['telephone']; ?><br>
<?php echo $donnees['gsm']; ?><br>
<?php 
$sql = ('SELECT COUNT(*) AS nb FROM historique WHERE client ='.$donnees['ID']);
$retour = mysql_query($sql);
$donnees = mysql_fetch_array($retour);

echo 'Nombre de facture:'.$donnees['nb'];
}
?></td></tr></table>
