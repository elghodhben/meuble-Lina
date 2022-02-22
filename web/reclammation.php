<?php
include('cnx.php');
$message=htmlentities($_POST['Message']);
$date=date("j-F-Y / H:i:s");
$req='INSERT into reclammation values("","'.$_SESSION['client']['nom'].'","'.$_SESSION['client']['prenom'].'","'.$message.'","'.$_SESSION['client']['mail'].'","'.$date.'")';
$res=$idcom->query($req);
if($res)
{
    header('location:mail.php?msg=votre reclammation a étè envoyer');
}
else
{
    header("location:mail.php?msg=erreur d'insertion de reclammation");
}
?>