<?php
require_once "cnx.php";
require_once "appel_css.php";
require_once "script.php";
?>
<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a  class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>MeuBlina</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <?php echo $_SESSION['admin']['nom']?> <span class="fa fa-circle text-success">En ligne</span>

                        </a></li>
                        
                        <li class="dropdown user user-menu">
                        <a href="deconnexion.php" class="dropdown-toggle">Déconnexion</a>
                        </li>
                    <!-- Control Sidebar Toggle Button -->

            </div>
        </nav>
    </header>

 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <?php
include('menu.php');
?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
<?php
ob_start();
//client et en-tÃ¨te
?>
<table><tr>
<td width='200'><img src='../web/images/logo1.jpg' width='160' height='150'></td>
<td width='230'>Nom<br>Prénom<br>CIN<br></td>
<td width='200'>
<?php
include('connect.php');
$query = ('SELECT * FROM commande WHERE id_commande ='.$_GET['id_commande']);
$reponce = mysql_query($query);
$donnees = mysql_fetch_array($reponce);
?>
<?php echo $donnees['nom_client']; ?><br>
<?php echo $donnees['prenom_client']; ?><br>
<?php echo $donnees['cin']; ?><br>

</td></tr></table><br><br>
<?php 
$client = array($donnees['nom_client'], $donnees['prenom_client'], $donnees['cin']);
$id_personne = $donnees['cin'];
?>
<table>
<tr><td width='400'>Facture Numéro :
<?php
$sql1 = ('SELECT COUNT(*) AS nb FROM commande where id_commande='.$_GET['id_commande'] );
$retour1 = mysql_query($sql1);
$donnees1 = mysql_fetch_array($retour1);
$shuffled = date('y-s').'-'.date('i') ;
echo $shuffled;
?>
</td><td><?php include('forme/date.php'); ?></td></tr>
</table>
<!-- contenu de la page tableau etc... -->
<?php
$retour = 'SELECT * FROM commande WHERE id_commande ='.$_GET['id_commande'];
$donnees1 = mysql_query($retour);
?>
<br><br>
<table border='1'>
<tr><th width='200'> Nom article </th><th width='100'> Prix unitaire </th><th width='100'> Quantit&eacute; </th>
<th width='100'>Frais de livraison</tr>
<?php
$tot=0;
while( $donnees = mysql_fetch_array($donnees1))
{
echo '<tr><td>';
echo $donnees['nom_art'];
echo '</td><td>';
echo $donnees['prix'];
echo '</td><td>';
echo$donnees['quantite_art'];
$prix = $donnees['prix'] * $donnees['quantite_art'];
echo '</td>';
if($donnees['livraison']=="a domicile")
{
echo '<td>';
echo'0 DT';
echo '</td>';
}
else
{
echo '<td>';
echo '50 DT';
$tot+=50;
echo '</td>';
}
echo'<td>';
echo round($prix, 2) . ' DT';
echo '</td></tr>';
$tot = $tot + $prix;
}
?>
</table>
<br>
<table><tr><td width='400'></td><td><b>TOTAL HTVA: <?php echo$tot . ' DT'; ?></b></td></tr></table>
<!-- tableau TVA -->

<p>
Dexia: 792-5772646-34
</p>
<?php

$varbanque='Dexia: 792-5772646-34';
$out = ob_get_contents();
ob_end_clean();

include('text/generation_pdf.php');
echo $out;
$file = fopen('facture/'.$shuffled.'.txt','a+');

$ecrire = fputs($file, "<div id=fr>".$out."</div>");

if($ecrire)
{
echo 'enregistrement bien effectu&eacute;';
}
else
{
echo 'erreur lors de l\'enregistrement';
}
$id=$_GET['id_commande'];
$req= 'INSERT INTO facture values("","'.$shuffled.'","'.$id.'")';
$res= mysql_query($req);
?>
<p align="center"><a href ='gestionfactures.php'><button type="button" class="btn btn-success">Retour au liste commande</button></a></p>
<?php $_SESSION['nom_facture']=$shuffled;?>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>

          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>

  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->


</body>
</html>