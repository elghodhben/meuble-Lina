<?php
include ("connexobjet.php");
$idcom=connexobjet("localhost","root","","meuble");

$l=mysql_real_escape_string($_POST['mail']);
$p=mysql_real_escape_string($_POST['Mdp']);

$req="SELECT * from entreprise where mail_ese='$l' and mdp_ese='$p' and etat=0";
$res=$idcom -> query ($req) or die (mysql_error());
$tab=mysqli_fetch_array($res);
if(count($tab)!=0)
{
    session_start();
    $_SESSION['entreprise']['nom']=$tab['nom_responsable'];
    $_SESSION['entreprise']['mail']=$tab['mail_ese'];
header('location:index.php');
}
else
{
header('location:loginentreprise.php?msg=données incorrect !');
}
?>