<?php
session_start();
unset($_SESSION['client']['id']);
unset($_SESSION['client']['nom']);
header('location:index.php');
?>
