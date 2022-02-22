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
              <h3 class="box-title">Liste des commandes</h3>
            </div>
            <!-- /.box-header -->
                        <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <tr class="danger">
                    <th>Nom & Prénom</th>
                    <th>Photo</th>
                    <th>Article</th>
                    <th>Quantité</th>
                    <th>Ville</th>
                    <th>Cité</th>
                    <th>Mode livraison</th>
                    <th>Date de commande</th>
                    <th>Statut</th>
                </tr>
                <tbody>
                <?php
                                $requete = "SELECT * FROM commande GROUP BY cin order by id_commande";
                                $result = $idcom->query($requete);
                                if ($result) {
                while ($row = $result->fetch_assoc()) { 
                    echo"<th>$row[nom_client] $row[prenom_client]</th> ";
                    $requete1 = "SELECT * FROM commande where cin=$row[cin] order by id_commande";
                    $result1 = $idcom->query($requete1);
                    while ($row1 = $result1->fetch_assoc()) { 
echo "<tr>";
echo"<td></td>";
echo "<td><img src='../web/images/$row1[img_art]' width=150 height=70></td>";
echo "<td> $row1[nom_art] </td>";
echo "<td> $row1[quantite_art] </td>";
echo "<td> $row1[ville] </td>";
echo "<td> $row1[cite] </td>";
echo "<td> $row1[livraison] </td>";
echo "<td> $row1[date_commande] </td>";
echo "<td> $row1[statut] </td></tr>";
                    }?>
                       <tr> <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                       <?php 
                       if($row['statut']=='confirmer')
                       {?>
                         <td> <a href ="supprimer_commande.php?id=<?php echo$row['id_commande'] ?>""><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                        <?php }
                        else
                        {?>
                      
                       <td> <a href ="confirmer_commande.php?id=<?php echo$row['id_commande'] ?>"><button type='button' class='btn btn-success'>Confirmer</button></a></td>
                       <?php }?>
                </tr>    
                           <?php  } }
                                else
                                {
                                    echo"<tr><td>";
                                    echo "pas de commande existe";
                                    echo"</td></tr>";
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

</div>

</body>
</html>
