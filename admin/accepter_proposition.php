<?php
include ("cnx.php");
$id_art=$_GET['id'];

$req="SELECT * from proposition where  id_art=$id_art";
$res=$idcom -> query($req);
$tab=mysqli_fetch_array($res);
if(count($tab)!=0)
{
    $img=$tab['img_art'];
    $des=$tab['des_art'];
    $lib=$tab['lib_art'];
    $prix=$tab['prix_art'];
    $nbr=$tab['nbr_art'];
    $id=$tab['id_cat'];
    $mail=$tab['mail_ese'];
    $req1="INSERT into article values('','$img','$des','$lib',$prix,$nbr,$id)";
    $res1=$idcom->query($req1);
    if($res1) 
    {

$req2="UPDATE `meuble`.`proposition` SET `statut` = 'accepter' WHERE `proposition`.`mail_ese` = '$mail' and `proposition`.`id_art`='$id_art';";
$res2=$idcom -> query($req2);

        header('location:gestionentreprise.php');
    }
    else
    {
        echo"erreur d'acceptation de propositin";
    }
}
?>