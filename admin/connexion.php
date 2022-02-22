<?php
include_once "cnxLogin.php";
$msg="";
if(isset($_POST) && !empty($_POST)){

    $req = "select * from administrateur where login='".$_POST['login']."' and pwd='".($_POST['pass'])."'";
    $res = $idcom->query($req);
    $verif=mysqli_fetch_array($res);
    if(count($verif)==0){
        $msg="Nom d'utilisateur ou mot de passe incorrect!!!";
    }else{
        $_SESSION['admin']['id'] = $verif['id'];
        $_SESSION['admin']['nom'] = $verif['prenom']." ".$verif['nom'];
        header('location:index.php');
    }

}
?>

<html>
<head>
    <title>connecter</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="loginbox">
    <p style="color: red;"><?php echo $msg?></p>
     <h1><img src="addmin.jpg"></h1>
    <h1> Se connecter</h1>

    <form action="connexion.php" method="post">
        <p>Login</p>
        <input type="text" name="login" placeholder="Saisir votre login" autocomplete="off" required>
        <p>Mot de passe</p>
        <input type="password" name="pass" placeholder="Saisir votre mot de passe" required>
        <p><input type="submit" value="Connecter" name="connect"></p>
    </form>
</div>
</body>
</html>

