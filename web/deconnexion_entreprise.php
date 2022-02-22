<?php
session_start();
unset($_SESSION['entreprise']['mail']);
unset($_SESSION['entreprise']['nom']);
header('location:index.php');
?>