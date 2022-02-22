 <?php
require_once "cnx.php";
$id=$_GET['id_art'];
$req="delete from article where id_art=$id";
$res=$idcom->query($req);
header("location:gestionarticle.php");
?>