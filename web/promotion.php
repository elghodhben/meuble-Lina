<?php
include('cnx.php');
?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>exposition meuble</title>
<?php
    include_once "balise_head.php";?>
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
	
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>promotion</li>
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
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner3">
				<h3>Meilleures Ofrres Pour Les Nouveaux Articles<span class="blink_me"></span></h3>
			</div>
			<div class="w3l_banner_nav_right_banner3_btm">
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/s2.jpg" alt=" " class="img-responsive" />
                        <div class="mask">
							<h4>Meublina</h4>
							<p>Meilleures site D'exposition des meubles.</p>
						</div>
					</div>
					
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/14.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Meublina</h4>
							<p>Meilleures site D'exposition des meubles.</p>
						</div>
					</div>
					
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/oo.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Meublina</h4>
							<p>Meilleures site D'exposition des meubles.</p>
						</div>
					</div>
					
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid">
				<h3>Nos Promotion</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6>Sallon</h6>
					
                    <?php 
                    $req="SELECT * from article where id_cat=1 limit 3";
                    $result=$idcom->query($req);
			 while ($row = $result->fetch_assoc())
			 { ?>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<img src="images/<?php echo $row['img_art']?>" width=150 height=70 alt=" " />
											<p><?php echo $row['des_art']?></p>
											<h4> <?php echo $row['prix_art']?><span><?php echo $row['prix_art']+320?> DT</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
					 <button type="button" class="button btn_add_panier" id_article="<?php echo $row['id_art']?>">Ajouter au panier</button>
						 
					 </div>
									</div>
								</figure>
							</div>
						</div>
						</div>
                    </div>
             <?php }?>
					<div class="clearfix"> </div>
				</div>
				
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6>Cuisine</h6>
					
                    <?php 
                    $req="SELECT * from article where id_cat=6 limit 3";
                    $result=$idcom->query($req);
			 while ($row = $result->fetch_assoc())
			 { ?>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<img src="images/<?php echo $row['img_art']?>" width=150 height=70 alt=" " />
											<p><?php echo $row['des_art']?></p>
											<h4> <?php echo $row['prix_art']?><span><?php echo $row['prix_art']+320?> DT</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
					 <button type="button" class="button btn_add_panier" id_article="<?php echo $row['id_art']?>">Ajouter au panier</button>
						 
					 </div>
									</div>
								</figure>
							</div>
						</div>
						</div>
                    </div>
             <?php }?>
					<div class="clearfix"> </div>
				</div>
					<div class="clearfix"> </div>
				</div>
				
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6>Bureau</h6>
					
                    <?php 
                    $req="SELECT * from article where id_cat=7 limit 3";
                    $result=$idcom->query($req);
			 while ($row = $result->fetch_assoc())
			 { ?>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<img src="images/<?php echo $row['img_art']?>" width=150 height=70 alt=" " />
											<p><?php echo $row['des_art']?></p>
											<h4> <?php echo $row['prix_art']?><span><?php echo $row['prix_art']+320?> DT</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
					 <button type="button" class="button btn_add_panier" id_article="<?php echo $row['id_art']?>">Ajouter au panier</button>
						 
					 </div>
									</div>
								</figure>
							</div>
						</div>
						</div>
                    </div>
             <?php }?>
					<div class="clearfix"> </div>
                </div>
             </div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
    </div>
             </div></div><br><br>
<!-- //banner -->
<!-- footer -->
<?php
include('fouter.php');
?>
<!-- //footer -->
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