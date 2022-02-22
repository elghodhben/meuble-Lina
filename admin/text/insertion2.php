<?php

  //connection au serveur
include('connect.php');

//verification de l'adresse e-mail
function VerifierAdresseMail($adresse)
{
   $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
   if(preg_match($Syntaxe,$adresse))
      return true;
   else
     return false;
}

//remplacement de la virgule par un point
function virgule($nombre)
{
	$nombre = preg_replace('#(.+),(.+)#','$1.$2',$nombre);
	return $nombre;
}

 if($_GET['type'] == 'client')
{
  //rÃ©cupÃ©ration des valeurs des champs:
  //nom:
  $nom     = $_POST["nom"] ;
  //prenom:
  $adresse1 = $_POST["adresse1"] ;
  //adresse:
  $adresse2 = $_POST["adresse2"] ;
  $tvaclient = $_POST['tvaclient'];
  //code postal:
  $telephone = $_POST["telephone"] ;
  //numÃ©ro de tÃ©lÃ©phone:
  if($_POST['oui'])
  {
  $mail = $_POST["mail"];
  $email = VerifierAdresseMail($mail);
  }
  else
  {
  $mail = '';
  $email = 'true';
  }
  
  if($email)
  {
  //crÃ©ation de la requÃªte SQL:
  $sql = "INSERT INTO client VALUES ( '','$tvaclient', '$nom', '$adresse1', '$adresse2', '$telephone', '$mail') " ;
  //echo $sql;
  //exÃ©cution de la requÃªte SQL:
  $requete = mysql_query($sql) ;
  }
  else
  {
  echo 'Vous devez rentrer une adresse e-mail valide';
  }

}
elseif($_GET['type'] == 'produit')
{
//recuperation des valeurs POST
$nom = $_POST['nom'];
$description = $_POST['description'];
$motclef = $_POST['motclef'];
$prix = $_POST['prix'];
$tva = $_POST['TVA'];
$fournisseur = $_POST['fournisseur'];

$prix = virgule($prix);
//creation du sql et insertion
if($affiche=='') { $affiche = 'true'; } else { $affiche = 'false'; }

$sql = "INSERT INTO fromage VALUES ('','$nom','$prix','$tva','$fournisseur')";
 //echo $sql; 
  //exÃ©cution de la requÃªte SQL:
  $requete = mysql_query($sql) ;
}
elseif($_GET['type'] == 'fournisseur')
{
$fournisseur = htmlentities($_POST['fournisseur']);
$sql = "INSERT  INTO fournisseur VALUES ( '', '".$fournisseur."') " ;
  
  //exÃ©cution de la requÃªte SQL:
  $requete = mysql_query($sql) ;
  }
  //affichage des rÃ©sultats, pour savoir si l'insertion a marchÃ©e:
  if($requete)
  {
    echo("L'insertion a Ã©tÃ© correctement effectu&eacute;e pour la facturation<br>") ;
  }
  else
  {
    echo("L'insertion Ã  Ã©chou&eacute;e pour la facturation<br>") ;
  }
  include('text/insertion1.php');
?>
