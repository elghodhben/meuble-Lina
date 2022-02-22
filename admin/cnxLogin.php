<?php
session_start();

if (isset($_SESSION['admin'])) {
    header('location:index.php');
}
$idcom = new mysqli("localhost", 'root', '', 'meuble');


?>