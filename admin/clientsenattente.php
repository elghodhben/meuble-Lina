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
                            <h3 class="box-title">Liste des clients </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr class="danger">
                                    <th>CIN</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $requete = "SELECT * FROM client";
                                $result = $idcom->query($requete);
                                if (!$result) {
                                    echo"<tr><td>";
                                    echo "pas de clients existe";
                                    echo"</td></tr>";
                                } else {
                                    $nbcol = mysqli_num_fields($result);
                                    $nbmod = mysqli_num_rows($result);

                                    while ($row = $result->fetch_assoc()) {
                                        if($row['etat']==0)
                                        {
                                        echo "<tr>";
                                        echo "<td> $row[cin_cl] </td>";
                                        echo "<td> $row[nom_cl] </td>";
                                        echo "<td> $row[pre_cl] </td>";
                                        echo "<td> $row[mail_cl] </td>";
                                        echo "<td> $row[adr_cl] </td>";
                                        echo "<td> $row[tlph_cl] </td>";
                                      echo "<td><a href ='bloquer_client.php?cin_cl=$row[cin_cl]'><button type=\"button\" class=\"btn btn-danger\">Bloquer</button></a></td>";
                                        echo "</tr>";
                                        }
                                        else
                                        {
                                            echo "<tr style='background-color:red;'>";
                                            echo "<td> $row[cin_cl] </td>";
                                            echo "<td> $row[nom_cl] </td>";
                                            echo "<td> $row[pre_cl] </td>";
                                            echo "<td> $row[mail_cl] </td>";
                                            echo "<td> $row[adr_cl] </td>";
                                            echo "<td> $row[tlph_cl] </td>";
                                          echo "<td><a href ='debloquer_client.php?cin_cl=$row[cin_cl]'><button type=\"button\"  class='btn btn-success'>Débloquer</button></a></td>";
                                           // echo "<td> <a href ='refuserclient.php?cin_cl=$row[cin_cl]'><button type=\"button\" class=\"btn btn-danger\">Danger</button></a></td>";
    //Affiche 1 à 1 de 1 entrées
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
        <!-- /.content -->
    </div>

</div>

</body>
</html>
