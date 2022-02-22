<?php
require_once "cnx.php";
$id=$_GET['id_cat'];
$req="delete from categorie where id_cat=$id";
$res=$idcom->query($req);
header("location:gestioncategorie.php");
?>