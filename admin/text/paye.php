<h3>PAYEMENT</h3>
<?php

include('connect.php');

$sql = " UPDATE `historique` SET `paye` = '1' WHERE `ID` =".$_GET['id'];
$result = mysql_query($sql);

if($result)
{
echo 'La facture est pay&eacute;e';
}
else
{
echo 'Erreur lors du payement';
}

