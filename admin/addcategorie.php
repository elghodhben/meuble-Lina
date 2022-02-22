<?php
include("cnx.php");
$nomcat=$_POST['nomcat'];
$numcat=$_POST['numcat'];
$req="insert into categorie values($numcat,'$nomcat')";

$res=$idcom->query($req) or die(mysql_error());
if($res)
{
    header('location:gestioncategorie.php');
}
else
{
    header('location:gestioncategorie.php?err=<?php echo$idcom->errno ?>');
}
?>