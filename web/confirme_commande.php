
<?php
include_once "cnx.php";
if((isset($_POST['ville']))&&(isset($_POST['cite']))&&(isset($_POST['livraison'])))
{
$_SESSION['commande']=array();
$_SESSION['commande']['ville']=$_POST['ville'];
$_SESSION['commande']['cite']=$_POST['cite'];
$_SESSION['commande']['livraison']=$_POST['livraison'];
}
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
				<li>Payment</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			 <?php 
				
				include ('menu.php');
				
				?>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
<!-- payment -->
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
			<h3>Votre Commande</span></h3>
		<div class="checkout-right">

		<table class="timetable_sub">
					<thead><tr>
							<th>Photo</th>	
							<th>Article</th>
							<th>Quantité</th>
							<th>Prix</th>
						</tr>	
					</thead>
					<tbody >
                        <?php $total=0;
					foreach ($_SESSION['panier'] as $article) 
					{ 
						$total=$total+($article['prix_article']*$article['qte']);
					?>
					<div class="res">
                    <tr class="rem1" id="ligne">
						<td  class="invert-image" ><img src="images/<?php echo$article['img_article'];?>" width=100 heght=50></td>
						<td class="invert" ><?php echo $article['nom_article'] ?></td>
						<td class="invert" >
									<span><?php echo $article['qte'] ?></span>
                        </td>
                         <td class="invert" ><?php echo number_format($article['prix_article'],2); ?> DT</td>
                         
                    </tr>
					<?php }?>
					<tr><td></td></tr>
					<tr><td><label class="control-label">Nom: </label></td><td><?php echo $_SESSION['client']['nom']; ?> </td></tr>
					<tr><td><label class="control-label">Prenom: </label></td><td><?php echo $_SESSION['client']['prenom']; ?> </td></tr>
					<tr><td><label class="control-label">Ville: </label></td><td><?php echo $_SESSION['commande']['ville']; ?> </td></tr>
					<tr><td><label class="control-label">Cité: </label></td><td><?php echo $_SESSION['commande']['cite']; ?> </td></tr>
					<tr><td><label class="control-label">Mode de livraison: </label></td><td><?php echo $_SESSION['commande']['livraison']; ?> </td></tr>
					<tr><td><label class="control-label">Total: </label></td><td><?php echo number_format($total,2); ?> DT </td></tr>
					<tr>
					<td><a href="insert_commande.php"><button type="button" class="btn btn-primary">Confirmer</button></a></td>
					<td><a href="annuler_commande.php"><button type="button" class="btn btn-primary">Annuller</button></a></td>
					<tr>
					</tbody>
					</div>

					
</table>
</div>
		</div>
<?php }?>
	<!--Plug-in Initialisation-->

	<!-- // Pay -->
	
			 </div>

		</div>
<!-- //payment -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->


<!-- newsletter -->
	
<!-- //newsletter -->
<!-- footer -->
	<?php include('fouter.php'); ?>
<!-- //footer -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- easy-responsive-tabs -->    
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<script src="js/easyResponsiveTabs.js"></script>
<!-- //easy-responsive-tabs --> 
	<script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
<!-- credit-card -->
		<script type="text/javascript" src="js/creditly.js"></script>
        <link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

		<script type="text/javascript">
			$(function() {
			  $(".creditly-card-form .submit").click(function(e) {
				e.preventDefault();
				var output = creditly.validate();
				if (output) {
				  // Your validated credit card output
				  console.log(output);
				}
			  });
			});
		</script>
	<!-- //credit-card -->

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