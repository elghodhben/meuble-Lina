<?php
include ("cnx.php");
$id=$_GET['id'];
$req="SELECT * from proposition where id_art=$id";
$res=$idcom -> query($req);
$tab=mysqli_fetch_array($res);
if(count($tab)!=0)
{
$mail=$tab['mail_ese'];
$req2="UPDATE `meuble`.`proposition` SET `statut` = 'refuser' WHERE `proposition`.`mail_ese` = '$mail' and `proposition`.`id_art`='$id';";
$res2=$idcom -> query($req2);

        header('location:gestionentreprise.php');
    }
    else
    {
        echo"erreur de refus de proposition";
    }

?>