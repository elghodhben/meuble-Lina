<!DOCTYPE html>
<html>
<head>
    <title>exposition meuble</title>
    <!-- for-mobile-apps -->
  <?php  include_once "balise_head.php";?>
    <!-- start-smoth-scrolling -->
</head>

<body>
<?php  include_once "header.php";?>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function () {
        var navoffeset = $(".agileits_header").offset().top;
        $(window).scroll(function () {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".agileits_header").addClass("fixed");
            } else {
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
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">meublina@gmail.com</a>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- //header -->
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Accueil</a><span>|</span></li>
            <li>Inscription ou Connexion</li>
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
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                        data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php
            include 'menu.php' ?>
        </nav>
    </div>
    <div class="w3l_banner_nav_right">
        <!-- login -->
        <div class="w3_login">
            <h3>Inscription ou Connexion</h3>
            <?php
            if (isset($_GET['msg'])) {
                echo "<h4 align='center'>" . $_GET['msg'] . "</h4>";
            }
            ?>
            <div class="w3_login_module">
                <div class="module form-module">
                    <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                        <div class="tooltip">Cliquer ici</div>
                    </div>
                    <div class="form">
                        <h2>S'authentifier</h2>
                        <form action="auth_client.php" method="post">
                            <input type="text" name="cin" placeholder="Votre CIN" required=" ">
                            <input type="password" name="Mdp" placeholder="Votre mot de passe" required=" ">
                            <input type="submit" value="Connecter">
                        </form>
                    </div>
                    <div class="form">
                        <h2>S'inscrire</h2>
                        <form action="ajouterclient.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="cin" placeholder="Numéro de carte d'identité" pattern="[0-9]{8}"
                                           required=" ">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="nom" placeholder="Nom" pattern="[a-zA-Z-\.]{3,20}" required=" ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="prenom" placeholder="Prénom" pattern="[a-zA-Z-\.]{3,20}"
                                           required=" ">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="Email"
                                           pattern="^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}" required=" ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="tel" placeholder="téléphone" pattern="[0-9]{8}" required=" ">
                            </div>

                                <div class="col-md-6">
                                    <input type="password" name="mdp" placeholder="mot de passe" pattern="[0-9a-zA-Z-\.]{6,20}"
                                           required=" ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea id="adr" name="adr"
                                              rows="5" cols="33" placeholder="Adresse..." pattern="[0-9a-zA-Z-\.]{20,50}"
                                              required=" "></textarea>
                                </div>
                            </div>

                            <input type="submit" value="Enregistrer"><br>
                        </form>
                    </div>

                </div>
            </div>
            <script>
                $('.toggle').click(function () {
                    // Switches the Icon
                    $(this).children('i').toggleClass('fa-pencil');
                    // Switches the forms
                    $('.form').animate({
                        height: "toggle",
                        'padding-top': 'toggle',
                        'padding-bottom': 'toggle',
                        opacity: "toggle"
                    }, "slow");
                });
            </script>
        </div>
        <!-- //login -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->
<!-- newsletter-top-serv-btm -->

<!-- //newsletter-top-serv-btm -->
<!-- newsletter -->
<?php include_once "fouter.php";?>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

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