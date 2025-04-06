<?php 
session_start();
session_destroy();
$title="LOGIN";
require_once ("header2.php");
?>
<link rel="stylesheet" href="css/insc.css">



<div class="container h-100">

<h1 class="text-center text-danger"> Inscription </h1><hr class="col-4">
<div class="box">
<!---formulaire-->
<form  action="../controller/inscriptioncontroll.php" class="" method="POST"><br>
<div class="row">
<div class="container h-200">
<div class="container text-center">
      <!----inscription administrateur---->
    <div class="col-lg-6 etudiant jumbotron">
    <h2>ETUDIANT </h2>
            <div class="inputBox">
                <input type="text"  name="pseudoe" id="pseudoe">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password"  name="mdpe" id="mdpe">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">forget password</a>
                <a href="#">Signup</a>
            </div>
            <input type="submit" name="bouton" value="Se connecter" class="btn-danger">
            <input type="submit" name="bouton" value="S'inscrire" class="btn-danger">
    </div>
    </form>
     <!----inscription administrateur---->
     <form action="../controller/inscriptioncontroll.php" class="" method="POST">
    <div class="col-lg-6 admin jumbotron">
    <h2>COMPTE ADMIN</h2>
            <div class="inputBox">
                <input type="text" name="pseudoa" id="pseudo">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="mdpa" id="mdp">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">forget password</a>
                <a href="#">Signup</a>
            </div>
            <input type="submit" name="bouton" value="connexion" class="btn-danger">
    </div>
</div></div>
</form>
</div></div>