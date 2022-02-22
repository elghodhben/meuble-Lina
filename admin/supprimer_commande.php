<?php
include ("cnx.php");
$id_commande=$_GET['id'];
$req2="UPDATE commande SET statut = 'refuse' WHERE id_commande = $id_commande";
$res2=$idcom -> query($req2);
if($res2)
{
    header('location:gestioncommande.php');
}
else
{
    echo"erreur de confirmation de commande";
}
?>