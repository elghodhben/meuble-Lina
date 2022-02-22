<?php
require_once "cnx.php";
require_once "appel_css.php";
require_once "script.php";
if(isset($_SESSION['nom_facture']))
{
$shuffled=$_SESSION['nom_facture'];
}
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Liste des Commandes confirmé</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr class="danger">
                <th></th>
                  <th>Date commande</th>
                  <th>Quantité</th>
                  <th>Nom article</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php

$requete="SELECT * FROM commande group by cin";
$result=$idcom -> query ($requete);
if(!$result)
{
echo " <tr><td>pas d'article existe</td></tr>";
}
else
{
$nbcol=mysqli_num_fields($result);
$nbmod=mysqli_num_rows($result);

while ($row1 = $result->fetch_assoc())
{ $cin=$row1['cin'];
  echo"<th>$row1[nom_client] $row1[prenom_client]</th> ";
  $requete1 = "SELECT * FROM commande where statut='confirmer'  and cin=$cin order by id_commande";
  $result1 = $idcom->query($requete1);
$id=$row1['id_commande'];

  $reqet = "SELECT * FROM facture where  id=$id";
  $resul = $idcom->query($reqet);
  $r=mysqli_fetch_assoc($resul);
  while ($row = $result1->fetch_assoc()) { 
?>
	<tr>
  <td></td>
	<td> <?php echo$row['date_commande']?> </td>
	<td> <?php echo$row['quantite_art']?></td>
	<td> <?php echo$row['nom_art']?> </td>

	</tr>


<?php }
    if($row1['id_commande']==$r['id'])
      {
echo"<tr><td></td><td></td><td></td><td></td>

<td> <a href='pdf/$r[numero_facture].pdf'><button type='button' class='btn btn-success'>Voir PDF de la facture</button></a></td></tr>";
      }
      else
      {
        echo"<tr><td></td><td></td><td></td><td></td>
        
        <td> <a href ='type_facture.php?id_commande=$row1[id_commande]'><button type='button' class='btn btn-success'>Faire une facture</button></a></td></tr>";
      }

} 
}
?>






                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
