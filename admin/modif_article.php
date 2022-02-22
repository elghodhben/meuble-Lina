<?php 
include('cnx.php');
$id=$_POST['id'];
$des=$_POST['n_description'];
$lib=$_POST['n_libelle'];
$prix=$_POST['n_prix'];
$qte=$_POST['n_quantite'];
$cat=$_POST['n_categorie'];
$photo=$_FILES['n_photo']['name'];
$cheminTemporaire=$_FILES['n_photo']['tmp_name'];
move_uploaded_file($cheminTemporaire,"../web/image/$photo");

$req="SELECT * from article where id_art=$id";
$res=$idcom->query($req) or die(mysql_error());

while($tab=$res->fetch_assoc())
{
if($prix=="")
{
$prix=$tab['prix_art'];
}
if($des=="")
{
$des=$tab['des_art'];
}
if($lib=="")
{
$lib=$tab['lib_art'];
}
if($photo=="")
{
$photo=$tab['img_art'];
}
if($qte=="")
{
$qte=$tab['nbr_art'];
}
if($cat=="")
{
$cat=$tab['id_cat'];
}
$mail=$tab['mail_ese'];
$statut=$tab['statut'];
}

$req="update article set id_cat=$cat , prix_art=$prix , des_art='$des' ,lib_art='$lib',nbr_art=$qte,img_art='$photo' where id_art=$id";
$res=$idcom->query($req) or die(mysql_error());
if($res)
{
    header('location:gestionarticle.php');
}
else
{
    echo"erreur";
}
?>