  <?php
  
 echo "<h3>modification</h3><p>cliquer sur un produit pour en modifier les donn&eacute;es</p>";
    //connection au serveur:
include('connect.php');
  
    //requÃªte SQL:
    $sql = ("SELECT * FROM fromage ORDER BY nom") ;
  
    //exÃ©cution de la requÃªte:
    $requete = mysql_query($sql) ;
  
    //affichage des donnÃ©es:
    while( $donnees = mysql_fetch_array( $requete ))
    {
?>

<a href="index.php?page=modification2&type=produit&id=<?php echo $donnees['ID']; ?>"><?php echo$donnees['nom']; ?></a><br>

<?php
    }  
 echo "<p>cliquer sur un client pour en modifier les donn&eacute;es</p>";

    //requÃªte SQL:
    $sql = ("SELECT * FROM client ORDER BY ID") ;
  
    //exÃ©cution de la requÃªte:
    $requete = mysql_query($sql) ;
  
    //affichage des donnÃ©es:
    while( $donnees = mysql_fetch_array( $requete ))
    {
?>

<a href="index.php?page=modification2&type=client&id=<?php echo $donnees['ID']; ?>"><?php echo$donnees['nom']; ?></a><br>

<?php
    }
    mysql_close();
  ?>
