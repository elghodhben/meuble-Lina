<?php
require_once "cnx.php";
$id=$_GET['id'];
$req="delete from proposition where id_art=$id";
$res=$idcom->query($req);
header("location:historiqueentreprise.php");
?>