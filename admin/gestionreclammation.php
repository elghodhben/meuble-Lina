<?php
require_once "cnx.php";
require_once "appel_css.php";
require_once "script.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Mailbox</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
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
      <br><br>
    
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Liste des Réclammation</h3>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tr>
                    <th>Nom & Prenom</th>
                    <th>E-mail</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th></th>
                    <th>Action</th>
                  </tr>
                  <tbody>
                  <?php

$requete="SELECT * FROM reclammation ORDER BY nom";
$result=$idcom -> query ($requete);
$count=$nbmod=mysqli_num_rows($result);
if(!$count)
{
echo "<tr><td>pas de reclammation existe</td></tr>";
}
else
{
$nbcol=mysqli_num_fields($result);
$nbmod=mysqli_num_rows($result);
while ($row = $result->fetch_assoc())
{
?>
                  <tr>
                    <td class="mailbox-name"><?php echo$row['nom'].' '.$row['prenom'];?></td>
                    <td class="mailbox-name"></a><?php echo$row['mail'];?></td>
                    <td class="mailbox-subject"><textarea><?php echo$row['message'];?></textarea> </td>
                    <td class="mailbox-subject"><textarea><?php echo$row['reponce'];?></textarea> </td>
                    <td class="mailbox-date"><?php echo $row['date'];?></td>
                    <td> <a href ='supprimereclammation.php?id=<?php echo$row['id']?>'><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                  </tr>
                  <?php }

}
?> 
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
            
        </div>
       
    <!-- /.content-wrapper -->


    

            
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