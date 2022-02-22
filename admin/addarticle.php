<?php
include("cnx.php");

$prix=$_POST['prix'];
$description=$_POST['description'];
$lib=$_POST['libelle'];
$quantite=$_POST['quantite'];
$categorie=$_POST['categorie'];
$photo=$_FILES['photo']['name'];
$cheminTemporaire=$_FILES['photo']['tmp_name'];
move_uploaded_file($cheminTemporaire,"..web/images/$photo");
$req="insert into article values('','$photo','$description','$lib',$prix,$quantite,$categorie)";
echo $req;
$res=$idcom->query($req);
if($res)
{
    header('location:gestionarticle.php');
}
else
{
    header('location:ajoutearticle.php?err=<?php echo$idcom->errno');
}
?>