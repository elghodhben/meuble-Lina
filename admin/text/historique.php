<h3>Historique des factures</h3>
<?php

include('connect.php');

$sql = "SELECT * FROM historique";
$result = mysql_query($sql);



echo "<table border='1'>"
?>
<script src='renvoie.js' language='javascript' type='text/javascript'></script>
<tr><th>Numero</th><th>Montant</th><th>type</th><th>date</th><th>client</th><th>payÃ©</th><th>renvoyer la facture</th></tr>
<?php
while($donnees = mysql_fetch_array($result))
{
?>
<tr><td><a href="index.php?page=viewfacture2&id=<?php echo $donnees['numero']; ?>">
<?php
$numero = $donnees['numero'];

echo $numero; ?></a></td><td><?php echo round($donnees['montant'],3); ?></td><td><?php echo $donnees['type']; ?></td><td><?php echo $donnees['date']; ?></td>
<?php
$sql1 = "SELECT * FROM client WHERE ID = ".$donnees['client'];
$result1 = mysql_query($sql1);
$donnees1 = mysql_fetch_array($result1);

echo '<td><a href="index.php?page=ficheclient&id='.$donnees1['ID'].'">'.$donnees1['nom'].'</a></td>';
if($donnees['paye'] == 0)
{
$var1 =  '<td><a href="index.php?page=paye&id='.$donnees['ID'].'">non pay&eacute;</a></td>';
echo $var1;
}
else
{
echo '<td>oui</td>';
}
$mail = $donnees1['mail'];
?>

<td><?php if(!$mail == '') { ?><input type='button' value="Renvoyer la facture" onClick="renvoie('<?php echo $donnees['numero']; ?>','<?php echo $donnees1['mail']; ?>')" /><?php } ?></td>
</tr>

<?php
}
?>

</table>

