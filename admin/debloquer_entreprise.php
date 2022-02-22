<?php
include ("cnx.php");
$mail=$_GET['mail'];
$req2="UPDATE `meuble`.`entreprise` SET `etat` = '0' WHERE `entreprise`.`mail_ese` = '$mail';";
$res2=$idcom -> query($req2);
echo "<script>
window.location.href='gestionentreprise.php';
</script>";
?>