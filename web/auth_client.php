<?php
include ("connexobjet.php");
$idcom=connexobjet("localhost","root","","meuble");

$l=mysql_real_escape_string($_POST['cin']);
$p=mysql_real_escape_string($_POST['Mdp']);

$req="SELECT * from client where cin_cl=$l and mdp_cl='$p' and etat=0";
$res=$idcom -> query ($req) or die (mysql_error());
$tab=mysqli_fetch_array($res);
if(count($tab)!=0)
{
    session_start();
    $_SESSION['client']['nom']=$tab['nom_cl'];
    $_SESSION['client']['prenom']=$tab['pre_cl'];
    $_SESSION['client']['cin']=$tab['cin_cl'];
    $_SESSION['client']['mail']=$tab['mail_cl'];
header('location:index.php');
}
else
{
header('location:login.php?msg=données incorrect !');
}
?>