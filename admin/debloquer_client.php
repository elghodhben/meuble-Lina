<?php
include ("cnx.php");
$cin_cl=$_GET['cin_cl'];

$req2="UPDATE `meuble`.`client` SET `etat` = '0' WHERE `client`.`cin_cl` = '$cin_cl';";
$res2=$idcom -> query($req2);

echo "<script>
window.location.href='clientsenattente.php';
</script>";
?>