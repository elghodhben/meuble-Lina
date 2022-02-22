<?php
include('connect.php');
$sql = "ALTER TABLE fromages AUTO_INCREMENT = 1";
$query = mysql_query($sql);
if($query)
{
echo 'auto increment Ã  zero<br>';
}
else
{
echo 'erreur<br>';
}

$sql = "ALTER TABLE facture AUTO_INCREMENT = 1";
$query = mysql_query($sql);
if($query)
{
echo 'auto increment Ã  zero<br>';
}
else
{
echo 'erreur<br>';
}
mysql_close();
?>
