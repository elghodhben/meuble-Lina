<?php
include_once "cnx.php";
if (isset($_POST['id_article']) && !empty($_POST['id_article'])) {
    $requete = "SELECT * FROM article  where id_art=" . $_POST['id_article'];
    $result = $idcom->query($requete);
    $row = $result->fetch_assoc();
    $_SESSION['panier'][$_POST['id_article']]['id'] = $row['id_art'];
    $_SESSION['panier'][$_POST['id_article']]['nom_article'] = $row['lib_art'];
    $_SESSION['panier'][$_POST['id_article']]['prix_article'] = $row['prix_art'];
    $_SESSION['panier'][$_POST['id_article']]['img_article'] = $row['img_art'];
    $qte = 0;
    if (isset($_SESSION['panier'][$_POST['id_article']])) {
        $qte = $_SESSION['panier'][$_POST['id_article']]['qte'];
    }
    $qte = $qte + 1;
    $_SESSION['panier'][$_POST['id_article']]['qte'] = $qte;
}
if (empty($_SESSION['panier'])) {
    echo "<div class='alert alert-info'>Votre panier est vide</div>";
} else {
    ?>
    <table class="table">
        <tr>
            <th>Photo</th>
            <th>Article</th>
            <th>Prix</th>
            <th>Qte</th>
            <th></th>
        </tr>
        <?php
        $total=0;
        foreach ($_SESSION['panier'] as $article) {
            ?>
            <tr id="ligne">
                <td><img src="images/<?php echo$article['img_article'];?>" width=100 heght=50></td>
                <td><?php echo $article['nom_article'] ?></td>
                <td><?php echo number_format($article['prix_article']*$article['qte'],2); ?> DT</td>
                <td><?php echo $article['qte'] ?></td>
                <td >
                    <button type="button" class="btn btn-danger btn-xs del_article_panier" id="delete" id_article="<?php echo$article['id']?>"><span
                                class="fa fa-trash-o"></span></button>
                </td>
            </tr>
            
            <?php
            
            $total = $total + ($article["qte"] * $article["prix_article"]);
           
        }echo'
        <tr>  
        <td colspan="3" align="right">Total</td>  
        <td align="right">DT '.number_format($total, 2).'</td>  
         
    </tr>';
        ?>
    </table>
    <?php
    if(!empty($_SESSION['panier']))
    {
        if(isset($_POST["action"]))
        {
                if($_POST["action"] == 'remove')
                    {
                        foreach($_SESSION["panier"] as $keys => $values)
                            {
                                if($values["id"] == $_POST["id"])
                                    {
                                        unset($_SESSION["panier"][$keys]); 
                                    }
                            }
                    }
    
            if($_POST["action"] == 'empty')
                {
                         unset($_SESSION["panier"]);
                        
                }

    }
}
}
?>
