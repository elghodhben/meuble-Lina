<!-- header -->
<div class="agileits_header">

    <div class="w3l_search">
        <form action="recherche.php" method="post">
            <input type="text" name="recherche" value="Recherche..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Recherche...';}" required="">
            <input type="submit" value="">
        </form>
    </div>

    <div class="product_list_header">
        <div class="div_panier">Voir le panier <span class="fa fa-shopping-cart"></span> </div>
    </div>
    <div class="w3l_header_right1">
        <h2><a href="mail.php">Contactez nous</a></h2>
    </div>
    <div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
				<a href="login.php"><i class="fa fa-user"></i><span class="caret"></span> Espace Client</a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="login.php">Connexion ou inscription</a></li>
                                <?php
                                include_once "cnx.php";
                                if((isset($_SESSION['client']['prenom']))&&(isset($_SESSION['client']['nom'])))
                                {echo"
                                <li><a href='espaceclient.php'>Consulter espace client</a></li>";
                                echo"
                                <li><a href='deconnexion.php'>Quitter</a></li>";
                                }?>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
        <div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
				<a href="loginentreprise.php"><i class="fa fa-user"></i><span class="caret"></span> Espace Entreprise</a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="loginentreprise.php">Connexion ou inscription</a></li> 
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

    <div class="clearfix"> </div>
</div>