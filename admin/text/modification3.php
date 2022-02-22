<?php
  //connection au serveur
include('connect.php');

//ferification de l'adresse e-mail
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
 
 if($_GET['type'] == 'produit')
 {
 //recuperations des variables POST
$id = $_POST['id'];
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$tva = $_POST['TVA'];
$fournisseur = $_POST['fournisseur'];


$prix = virgule($prix);

if($affiche == '') { $affiche = 'true'; } else { $affiche = 'false'; }
//creation de la requete SQL
$sql = "UPDATE `fromage` SET `nom` = '$nom', `description` = '$description', `motclef` = '$motclef', `prix` = '$prix', `TVA` = '$tva', `fournisseur` = '$fournisseur' WHERE `ID` = '$id'";

  //exÃ©cution de la requÃªte SQL:
  //echo $sql;
  $requete = mysql_query($sql);
 }
 elseif($_GET['type'] == 'client')
 {
 include('connect.php');
   //rÃ©cupÃ©ration des valeurs des champs:
  //nom:
  $nom     = $_POST["nom"] ;
  //prenom:
  $adresse1= $_POST["adresse1"] ;
  //adresse:
  $adresse2 = $_POST["adresse2"] ;
  $telephone = $_POST["telephone"] ;
  $mail = $_POST["mail"] ;
  //rÃ©cupÃ©ration de l'identifiant de la personne:
  $id         = $_POST["id"] ;
  
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
  $sql = " UPDATE `client` SET `nom` = '$nom',`adresse1` = '$adresse1',`adresse2` = '$adresse2',`telephone` = '$telephone',`mail` = '$mail' WHERE `ID` =$id ;";

  
  //exÃ©cution de la requÃªte SQL:
  $requete = mysql_query($sql);
 }
 else
 {
   echo 'Vous devez rentrer une adresse e-mail valide';
 }
 
 } 
  //affichage des rÃ©sultats, pour savoir si la modification a marchÃ©e:
  if($requete)
  {
    echo("La modification Ã  Ã©tÃ© correctement effectuÃ©e pour les factures<br>") ;
  }
  else
  {
    echo("La modification Ã  Ã©chouÃ©e pour les factures<br>") ;
  }
  //on rÃ©inclu modification1.php pour ne pas avoir Ã  recliquer sur le lien de modification
  include("modification1.php");

?>
