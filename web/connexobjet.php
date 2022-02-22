<?php
function connexobjet($host,$user,$pass,$base )
{
$idcom=new mysqli($host,$user,$pass,$base);
if (!$idcom)
{
echo "connexion impossible a la base";
exit () ;
}
return $idcom;
}
?>