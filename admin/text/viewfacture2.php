<?php
$file = fopen('facture/'.$_GET['id'].'.txt','r');

while($ligne = fgets($file))
echo $ligne;
?>

