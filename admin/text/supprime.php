<script type='text/javascript'>
<!--
function fermer() {
opener=self;
self.close();
} 
//-->
</script>
<?php

if (isset($_GET['telecharger']))
{

if (get_magic_quotes_gpc())
{
$nom = $_GET['telecharger'];
}

else
{
$nom = addslashes($_GET['telecharger']);
}

if ($nom != NULL)
{
if (file_exists($nom))
{
$pathinfo = pathinfo($nom);
if (in_array($pathinfo['extension'], array('php', 'php3', 'php4', 'php5', 'inc', 'phtml', 'html', 'htm')))
{
die ('Action refusÃ©e (suppression des fichiers php refusÃ©)');
}
else
{
unlink($nom);
?>
<body onload="javascript://fermer()">
</body>
<?php
}
}
else
{
die ('Le fichier sÃ©lectionnÃ© n\'existe pas');
}
}

else
{
die ('Aucun fichier indiquÃ©.');
}

}

else
{
die ('Aucun fichier Ã  supprimer.');
}

?>
