<?php
session_start();
unset($_SESSION['panier']);
unset($_SESSION['commande']);
header('location:index.php');
?>