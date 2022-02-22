<?php
  include('connect.php');

if($_GET['type'] == 'produit')
{

  //rÃ©cupÃ©ration de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id  = $_GET["id"] ;
  
  //requÃªte SQL:
  $sql = "SELECT *
            FROM fromage
	    WHERE ID = ".$id ;
	    
  //exÃ©cution de la requÃªte:
  $requete = mysql_query($sql) ;
  
  //affichage des donnÃ©es:
  if( $result = mysql_fetch_array($requete))
  {
  ?>
  <!--Creation du formulaire avec les donnÃ©es Ã  modifier-->
<h3>modification du produit</h3>
<form name="insertion" action="index.php?page=modification3&type=produit" method="POST">
  <input type="hidden" name="id" value="<?php echo $id ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Produit</td>
      <td><input type="text" name="nom" value="<?php echo $result['nom'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Prix</td>
      <td><input type="text" name="prix" value="<?php echo $result['prix'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>TVA</td>
      <td>      
<select name="TVA">
    <option value="6" <?php if($result['TVA'] == 6) { echo 'selected="selected"';  } ?>>6%</option>
    <option value="21" <?php if($result['TVA'] == 21) { echo 'selected="selected"';  } ?>>21%</option>
</select>   
<select name="fournisseur">
<?php
include('connect.php');

$sql = "SELECT * FROM fournisseur";
$query = mysql_query($sql);

while($donnees2 = mysql_fetch_object($query))
{
?>
<option value="<?php echo $donnees2->ID; ?>" <?php if($result['fournisseur'] == $donnees2->ID) { echo 'selected="selected"';  } ?>><?php echo $donnees2->fournisseur; ?></option>
<?php
}
?>   
</select>
      </td>
    </tr>
    <tr><td><input type='submit' value='modifier!'></td></tr>
  </table>
</form>
  <?php

  }//fin if 
  }
  elseif($_GET['type'] == 'client')
  {
  include('connect.php');
    //rÃ©cupÃ©ration de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id  = $_GET["id"] ;
  
  //requÃªte SQL:
  $sql = "SELECT *
            FROM client
	    WHERE ID = ".$id ;
	    
  //exÃ©cution de la requÃªte:
  $requete = mysql_query($sql) ;
  
  //affichage des donnÃ©es:
  if( $result = mysql_fetch_array($requete))
  {
  ?>
  <!--Creation du formulaire avec les donnÃ©es Ã  modifier-->
<h3>modification du client</h3>
<form name="insertion" action="index.php?page=modification3&type=client" method="POST">
  <input type="hidden" name="id" value="<?php echo $id ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Nom</td>
      <td><input type="text" name="nom" value="<?php echo $result['nom'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Adresse1</td>
      <td><input type="text" name="adresse1" value="<?php echo $result['adresse1'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>Adresse2</td>
      <td><input type="text" name="adresse2" value="<?php echo $result['adresse2'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>TÃ©lÃ©phone</td>
      <td><input type="text" name="telephone" value="<?php echo $result['telephone'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>e-mail</td>
      <td>?<input type="checkbox" name="oui" value="true"><input type="text" name="mail" value="<?php echo $result['mail'] ;?>"></td>
    </tr>
    <tr><td><input type='submit' value='modifier!'></td></tr>
  </table>
</form>
<?php  
  }
  }
  //fermeture de la connection Ã  mysql
  mysql_close();
  ?>

