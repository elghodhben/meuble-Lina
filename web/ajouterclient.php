<?php
include ("connexobjet.php");
$idcom=connexobjet("localhost","root","","meuble");
$cin=htmlentities($_POST['cin']);
$nom=htmlentities($_POST['nom']);
$prenom=htmlentities($_POST['prenom']);
$mdp=htmlentities($_POST['mdp']);
$email=htmlentities($_POST['email']);
$tel=htmlentities($_POST['tel']);
$adr=htmlentities($_POST['adr']);
$req="select * from client where cin_cl=$cin";
$res=$idcom->query($req);
if($res)
{
$req2 = "INSERT INTO client  VALUES ($cin,'$nom','$prenom','$mdp','$adr','$email',$tel,0)";
$res2=$idcom -> query($req2);
if(!$res2)
{
    header("location:login.php?msg=erreur d'inscription ! vérifier votre données");
}
else
{

    header('location:login.php?msg=Maintenant,vous etes inscrits ');

}
}
else
{
    header("location:login.php?msg= ce compte déja existe"); 
}
?>