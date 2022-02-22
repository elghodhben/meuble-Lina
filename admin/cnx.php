<?php
session_start();
//session_destroy();
if (!isset($_SESSION['admin'])) {
    header('location:connexion.php');
}
$idcom = new mysqli("localhost", 'root', '', 'meuble');


?>