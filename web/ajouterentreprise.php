<?php
include ("connexobjet.php");
$idcom=connexobjet("localhost","root","","meuble");

$nom=htmlentities($_POST['nom_res']);
$nomese=htmlentities($_POST['nom_ese']);
$mdp=htmlentities($_POST['mdp_ese']);
$email=htmlentities($_POST['email_ese']);
$tel=htmlentities($_POST['tel_ese']);
$adr=htmlentities($_POST['adr_ese']);
$req="select * from entreprise where mail_ese='$email'";
$res=$idcom->query($req);
if($res)
{
$req2 = "INSERT INTO entreprise  VALUES ('$email','$nom','$nomese','$mdp',$tel,'$adr',0)";
$res2=$idcom -> query($req2);
if(!$res2)
{
    header("location:loginentreprise.php?msg=erreur d'inscription ! vérifier votre données");
}
else
{

    header('location:loginentreprise.php?msg=Maintenant,vous etes inscrits ');

}
}
else
{
    header("location:loginentreprise.php?msg= ce compte déja existe"); 
}
?>