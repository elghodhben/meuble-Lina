<?php
include_once "cnx.php";
if(isset($_SESSION['entreprise']['nom']))
{
?>
<!DOCTYPE html>
<html>
<head>
<title>exposition meuble</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="text" name="Product" value="Recherche..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Recherche...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
        <div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
				<a href="login.php"><i class="fa fa-user"></i><span class="caret"></span> Espace entreprise</a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="login.php">Connexion ou inscription</a></li>
                                <?php
                                include_once "cnx.php";
                                if(isset($_SESSION['entreprise']['nom']))
                                {echo"
                                <li><a href='espace_entreprise.php'>Consulter espace entreprise</a></li>";
                                echo"
                                <li><a href='deconnexion_entreprise.php'>Quitter</a></li>";
                                }?>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="mail.html">Contactez nous</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>Exposition</span> Meublina</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="index.php">Accueil</a><i>/</i></li>
					<li><a href="services.php">Apropos</a><i>/</i></li>
					<li><a href="promotion.php">Nos promotions</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>74 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">meublina@gmail.com</a></li>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- banner -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                            <thead> <th style="color:green;"><?php echo"Bienvenue  : ".$_SESSION['entreprise']['nom']; ?></th>
                            <tr class="danger"><td>Proposition articles</td>
                             <td><a href="historiqueentreprise.php">Historique Proposition des articles</a></td>
                            </tr>
                            </thead>
                            </table>
                        </div>
                        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                        <?php
            if (isset($_GET['msg'])) {
                echo "<h4 align='center'>" . $_GET['msg'] . "</h5>";
            }
            ?>
                            <table id="example2" class="table table-bordered table-hover">
                            <thead> <tr class="danger">    
                            <th>Modifier un article </th>
                            <th>Anciens données</th>
                            <th>Nouvelles données</th>
                            </tr></thead>
                                <?php
                                $id=$_GET['id'];
                                $requete1 = "SELECT * FROM proposition where id_art=$id";
                                $result1 = $idcom->query($requete1);
                                
                                if (!$result1) {
                                    echo "pas d'article existe";
                                } else {
                                    while ($row = mysqli_fetch_array($result1)) {
                                    ?>
                                    <form method="post" action="modif_proposition.php" enctype="multipart/form-data">
                                        <tr>
                                            <td>image article</td>
                                            <td><img src="images/<?php echo $row['img_art']?>" width=150 height=70></td>
                                            <td><input type="file" name="n_photo"></td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td><?php echo $row['des_art']?></td>
                                            <td><input type="text" name="n_description"></td>
                                        </tr>
                                        <tr>
                                            <td>libellé</td>
                                            <td><?php echo $row['lib_art']?></td>
                                            <td><input type="text" name="n_libelle"></td>
                                        </tr>
                                        <tr>
                                            <td>prix</td>
                                            <td><?php echo $row['prix_art']?></td>
                                            <td><input type="text" name="n_prix"></td>
                                        </tr>
                                        <tr>
                                            <td>Quantité</td>
                                            <td><?php echo $row['nbr_art']?></td>
                                            <td><input type="text" name="n_quantite"></td>
                                        </tr>
                                        <tr>
                                            <td>Catégorie :</td>
                                            <td><?php 
                                            $requete = "SELECT * FROM categorie";
                                            $result = $idcom->query($requete); 
                                            while ($tab = mysqli_fetch_array($result)) {
                                                if($tab['id_cat']==$row['id_cat'])
                                                {
                                            echo $tab['lib_cat'];
                                                }
                                            }?>
                                            </td>
                                            <td><select name="n_categorie">
                                                    <option value="">choisir une categorie</option>
                                                    <?php
                                                    $requete = "SELECT * FROM categorie";
                                                    $result = $idcom->query($requete); 
                                                    while ($tab = mysqli_fetch_array($result)) {
                                                        ?>
                                                        <option value="<?php echo $tab['id_cat']; ?>"><?php echo $tab['lib_cat']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><input type="hidden" name="id" value="<?php echo$row['id_art']?>">
                                            <td><input type="submit" value="Ajouter les modifications" class="btn btn-success" class="btn btn-default btn-flat"">
                                    </form>
                                    <?php
                                }}
                                ?>

                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                                
                            
                                
	
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
        <div class="clearfix"> </div>
					<div class="clearfix"> </div>
					
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>
<?php
}
else
{
    header('location:index.php');
}
?>