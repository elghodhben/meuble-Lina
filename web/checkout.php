<?php
include_once "cnx.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>exposition meuble</title>
<!-- for-mobile-apps -->
    <?php
    include_once "balise_head.php";?>
<!-- start-smoth-scrolling -->
</head>
<body>
    <?php
include_once "header.php";?>
<!-- header -->
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
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Passer commande</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
               <?php 
				
				include ('menu.php');
				
				?>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
<!-- about -->
<?php
if(!isset($_SESSION['client']['nom']))
{
echo'<div class="privacy about">
<h3>Vous devez connecter pour passer une commande</h3>
	</div>';
}
else
{?>
		<div class="privacy about">
			<h3>Passer<span> Commande</span></h3>
			
	      <div class="checkout-right">
					
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Photo</th>	
							<th>Article</th>
							<th>Quantité</th>
							<th>Prix</th>
							<th>Supprimer</th>
						</tr>
                    </thead>
                    <?php
                    if (empty($_SESSION['panier'])) {
    echo "<tr><td><div class='alert alert-info'>Votre panier est vide</div></td></tr>";
} else {?>
					<tbody >
                        <?php
					foreach ($_SESSION['panier'] as $keys=> $article) {?>
					<div class="res">
                    <tr class="rem1" id="ligne">
						<td  class="invert-image" ><img src="images/<?php echo$article['img_article'];?>" width=100 heght=50></td>
						<td class="invert" ><?php echo $article['nom_article'] ?></td>
						<td class="invert" >
									<div class="entry value"><span><?php echo $article['qte'] ?></span></div>
                        </td>
                         <td class="invert" ><?php echo number_format($article['prix_article']*$article['qte'],2); ?></td>
                         <td>
                    <button type="button" class="btn btn-danger btn-xs del_article_panier"  id="delete" id_article="<?php echo$article['id']?>"><span
                                class="fa fa-trash-o"></span></button>
                </td>
                    </tr>
                    <?php }?>
					</tbody>
					</div>
					<?php }	?>
					
            </table>
			</div>
			<br>
				<div class="col-md-8 address_form_agile">
					  <h4>Données complémentaires</h4>
					  <form action="confirme_commande.php" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												
												<div class="w3_agileits_card_number_grids">
													
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Ville: </label>
														 <input class="form-control" type="text" name="ville" placeholder="Ville" required>
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Ville/Cité: </label>
												 <input class="form-control" type="text"  name="cite" placeholder="Ville/Cité" required>
												</div>
													<div class="controls">
															<label class="control-label">Type de livraison : </label>
												     <select class="form-control option-w3ls" name="livraison" required>
																							<option>--------</option>
																							<option value="à domicile">A Domicile</option>
																							<option value="par transporteur">Par transporteur</option>
							
																					</select>
													</div>
											</div>
											<button class="submit check_out">Livraison à cette adresse</button>
										</div>
									</section>
								</form>
									
					</div>
				<div class="clearfix"> </div>
				
			</div>

		</div>
					<?php }?>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->


<!-- newsletter -->
	<?php include('fouter.php');?>
<!-- //footer -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
							 <!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
										var qte_article = $(this).attr("id_article");
										qte_article=qte_article+1;
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
										var qte_article = $(this).attr("id_article");
										qte_article=qte_article-1;
									});
									</script>
								<!--quantity-->
							<script>

							$(document).on('click', '#delete', function(){
								
									var id_article = $(this).attr("id_article");
										var action = 'remove';
						$.ajax({
								url:"sup_ligne_tab.php",
								method:"POST",
								data:{id: id_article,action:action},
								success:function(result)
									{
										$('.res').remove();
										$("#ligne").removeClass("fixed");
										
									}
							
									});	  
								});
						   </script>
							

<!-- //js -->
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
<!-- Bootstrap Core JavaScript -->
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
<div class="modal fade" id="ModalPanier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Votre panier</h4>
            </div>
            <div class="modal-body body_panier">
                ...
			</div>
			
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"id="clear_cart">Vider</button>
               <a href="checkout.php"> <button type="button" class="btn btn-primary" >Passer commande</button></a>
			</div>
			
        </div>
    </div>
</div>
</body>
</html>