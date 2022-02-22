<?php
include("cnx.php");
$mail=$_SESSION['entreprise']['mail'];
$prix=$_POST['prix'];
$description=$_POST['description'];
$lib=$_POST['libelle'];
$quantite=$_POST['quantite'];
$categorie=$_POST['categorie'];
$photo=$_FILES['photo']['name'];
$cheminTemporaire=$_FILES['photo']['tmp_name'];
move_uploaded_file($cheminTemporaire,"images/$photo");
$req="insert into proposition values('','$photo','$description','$lib',$prix,$quantite,'$mail','en_attente',$categorie)";
$res=$idcom->query($req);
if($res)
{
    header('location:historiqueentreprise.php');
}
else
{
    header('location:proposition_entreprise.php?err=erreur d"insertion');
}
?>