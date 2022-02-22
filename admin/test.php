<?php
require_once "cnx.php";
$req="select id_commande from commande order by id_commande desc limit 1";
$res=$idcom->query($req);
$tab=mysqli_fetch_assoc($res);
if($res)
{
    echo$tab['id_commande']+1;
}
?>