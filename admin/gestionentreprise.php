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
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
           <!-- <div class="user-panel">
                <div class="pull-left image">
                    <img src="ad.jpg" class="img-circle" alt="User Image">
                </div>

            </div>
            <!-- search form -->
          <!--  <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Rechercher...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form> !-->

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
                            <h3 class="box-title">Liste des entreprises</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr class="danger">
                                    <th>Nom entreprise</th>
                                    <th>Nom responsable</th>
                                    <th>E-mail</th>
                                    <th>Adresse</th>
                                    <th>Mot de passe</th>
                                    <th>Téléphone</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $requete = "SELECT * FROM entreprise ";
                                $result = $idcom->query($requete);
                                if (!$result) {
                                    echo "<tr><td>";
                                    echo "pas de compte entreprise existe";
                                    echo "</td></tr>";
                                } else {
                                    $nbcol = mysqli_num_fields($result);
                                    $nbmod = mysqli_num_rows($result);

                                    while ($row = $result->fetch_assoc()) {
                                        if($row['etat']==0)
                                        {
                                        echo "<tr>";
                                        echo "<td> $row[nom_ese] </td>";
                                        echo "<td> $row[nom_responsable] </td>";
                                        echo "<td> $row[mail_ese] </td>";
                                        echo "<td> $row[adr_ese] </td>";
                                        echo "<td> $row[mdp_ese] </td>";
                                        echo "<td> $row[tlf_ese] </td>";
                                      echo "<td><a href ='bloquer_entreprise.php?mail=$row[mail_ese]'><button type=\"button\" class=\"btn btn-danger\">Bloquer</button></a></td>";
                                       
                                        echo "</tr>";
                                        }
                                        else
                                        {
                                            echo "<tr style='background-color:red;'>";
                                            echo "<td> $row[nom_ese] </td>";
                                            echo "<td> $row[nom_responsable] </td>";
                                            echo "<td> $row[mail_ese] </td>";
                                            echo "<td> $row[adr_ese] </td>";
                                            echo "<td> $row[mdp_ese] </td>";
                                            echo "<td> $row[tlf_ese] </td>";
                                          echo "<td><a href ='debloquer_entreprise.php?mail=$row[mail_ese]'><button type=\"button\" class='btn btn-success'>Déloquer</button></a></td>";
                                           
                                            echo "</tr>";
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
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des propositions</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr class="danger">
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Libellé</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Mail de l'entreprise</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $requete = "SELECT * FROM proposition where statut='en_attente'";
                                $result = $idcom->query($requete);
                                if (!$result) {
                                    echo "<tr><td>";
                                    echo "pas de proposition existe";
                                    echo "</td></tr>";
                                } else {
                                    $nbcol = mysqli_num_fields($result);
                                    $nbmod = mysqli_num_rows($result);

                                    while ($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<td><img src='../web/images/$row[img_art]' width=150 height=70></td>";
                                        echo "<td> $row[des_art] </td>";
                                        echo "<td> $row[lib_art] </td>";
                                        echo "<td> $row[prix_art] </td>";
                                        echo "<td> $row[nbr_art] </td>";

                                        echo "<td> $row[mail_ese] </td>";

                                      echo "<td><a href ='accepter_proposition.php?id=$row[id_art]'><button type='button' class='btn btn-success'>Accepter</button></a></td>";
                                      echo "<td><a href ='refuser_proposition.php?id=$row[id_art]'><button type=\"button\" class=\"btn btn-danger\">Refuser</button></a></td>";
                                       
                                        echo "</tr>";


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

<?php
require_once "script.php";?>
</body>
</html>
