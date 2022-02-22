<?php
include('connect.php');

$query = ('SELECT * FROM fromage ORDER BY nom');

$reponce = mysql_query($query);
?>
<form method='POST' action='index.php?page=facture2'>
<table border='1'>
<tr>
<td colspan='5'>
<select name="choix">
    <option value="FACTURE">FACTURE</option>
    <option value="BON DE CAISSE">BON DE CAISSE</option>
    <option value="DEVIS">DEVIS</option>
<option value="DUPLICATA">DUPLICATA</option>
</select>
</td>
</tr>
<tr>
<td>
<?php
include('text/classement.html');
?>
</td><td>
<?php
$query = ('SELECT * FROM client');
$reponce = mysql_query($query);

while($donnees = mysql_fetch_array($reponce))
{
?>
<?php echo $donnees['nom_cl']; ?>

<input type='radio' name='client' value ='<?php echo $donnees['ID']; ?>'><br />
<?php } ?></td></tr></table>
<input type='submit' value='Faire la facture'></form>
