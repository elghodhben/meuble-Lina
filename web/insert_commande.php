<?php
include('cnx.php');
$req="select id_commande from commande order by id_commande desc limit 1";
$res=$idcom->query($req);
$tab=mysqli_fetch_assoc($res);
$i=0;
if($res)
{
   $i+=$tab['id_commande']+1;
}
else
{
    $i=1;
}
if((isset($_SESSION['panier']))&&(isset($_SESSION['commande'])))
{   
    $total=0;
    $date=date("j-F-Y / H:i:s");
    foreach($_SESSION['panier'] as $article)
    { 
        $total=$total+($article['qte']*$article['prix_article']);
$req='INSERT into commande (id,nom_client,prenom_client,img_art,nom_art,quantite_art,ville,cite,livraison,cin,total,prix,date_commande,statut,id_commande) values
        ("","'.$_SESSION['client']['nom'].'","'.$_SESSION['client']['prenom'].'"
        ,"'.$article['img_article'].'","'.$article['nom_article'].'",'.$article['qte'].',"'.$_SESSION['commande']['ville'].'"
        ,"'.$_SESSION['commande']['cite'].'","'.$_SESSION['commande']['livraison'].'"
        ,'.$_SESSION['client']['cin'].','.$total.','.$article['prix_article'].',"'.$date.'","en_attente",'.$i.')';
        $res=$idcom->query($req);
    }
    unset($_SESSION['panier']);
    unset($_SESSION['commande']);
  
header('location:espaceclient.php');
}

?>