<h3>Inserer des donn&eacute;es</h3>
Un produit<br />
<!-- Formulaires-->
<?php include('connect.php'); ?>
<form name="insertion" action="index.php?page=insertion2&type=produit" method="POST" onSubmit="return check();">
  <table border="0" align="center" >
  
    <tr align="center">
      <td>Produit:</td>
      <td><input type="text" name="nom"></td>
    </tr>
    <tr align="center">
      <td>Prix HTVA:</td>
      <td><input type="text" name="prix"></td>
    </tr>
    <tr align="center">
      <td>TVA & fournisseur:</td>
      <td>      
      <select name="TVA">
    <option value="<?php echo $vartauxtva1; ?>"><?php echo $vartauxtva1; ?>%</option>
    <option value="<?php echo $vartauxtva2; ?>"><?php echo $vartauxtva2; ?>%</option>
</select>    

<select name="fournisseur">
<?php
include('connect.php');

$sql = "SELECT * FROM fournisseur";
$query = mysql_query($sql);

while($donnees = mysql_fetch_object($query))
{
echo "<option value='".$donnees->ID."'>".$donnees->fournisseur."</option>";
}
?>
</select>
   
      </td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="ins&eacute;rer"></td>
    </tr>
  </table>
</form>

Un client<br />
<form name="insertion" action="index.php?page=insertion2&type=client" method="POST">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Nom:</td>
      <td><input type="text" name="nom"></td>
    </tr>
    <tr align="center">
      <td>Adresse1:</td>
      <td><input type="text" name="adresse1"></td>
    </tr>
     <tr align="center">
      <td>Adresse2:</td>
      <td><input type="text" name="adresse2"></td>
    </tr>
 <tr align="center">
      <td>TVA client:</td>
      <td><input type="text" name="tvaclient"></td>
    </tr>
     <tr align="center">
      <td>Telephone:</td>
      <td><input type="text" name="telephone"></td>
    </tr>
     <tr align="center">
      <td>Adresse e-mail</td>
      <td>Oui?<input type="checkbox" name="oui" value="true"><input type="text" name="mail"></td>
    </tr>    
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="ins&eacute;rer"></td>
    </tr>
  </table>
</form>
Un fournisseur<br />
<form name="insertion" action="index.php?page=insertion2&type=fournisseur" method="POST">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Fournisseur:</td>
      <td><input type="text" name="fournisseur"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="ins&eacute;rer"></td>
    </tr>
  </table>
</form>
