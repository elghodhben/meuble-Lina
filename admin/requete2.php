<?php

include('../facture2/connect.php');

$sql = "SELECT * FROM article";

$query = mysql_query($sql);

echo '<table>';
while($donnees = mysql_fetch_object($query))
{
$nom = $donnees->lib_art;
?>

<tbody class="<?php echo $lib_art[0]; ?>" style="display:none;">
<td><?php echo $donnees->lib_art; ?></td>
<td><input type="checkbox"  value="<?php echo $donnees->id_art; ?>" name='oui<?php echo $donnees->id_art; ?>'></td>
<td><input type='text' name="quantite<?php echo $donnees->id_art; ?>" size='2' onBlur="style.background='#ffffff';if(value== ''){value='1'};" onFocus="style.background='#E4E4E4';if(value == '1'){value=''};" value='1'></td>
</tr></tbody>

<?php
}
?>
</table>

