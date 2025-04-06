<?php 
require_once("../model/etudiant.php");
session_start();
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
  exit; 
}

//  Etudiant
$etudiant = new Etudiant();
$etudiantInfo = $etudiant->get_student_info($_SESSION["ide"]);

$title="PROFIL";
require_once("header2.php");
?>

<h1 class="text-center"><u class="text-info">VOTRE PROFIL</u></h1>
<div class="container jumbotron h-100">
    <a href="etudiantvue.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
    
    <!-- Affichez les informations de l'étudiant -->
    <BR></BR><div class="col-lg-3"><p>PDP: <br><img src="img/<?php echo $etudiantInfo['PHOTOE']; ?>" alt="" class="img-circle"></p></div>
    <p>Nom: <?php echo $etudiantInfo['NOME']; ?></p>
    <p>Prenom: <?php echo $etudiantInfo['PRENOME']; ?></p>
    <p>Class: <?php echo $etudiantInfo['NIVEAUE']; ?></p>
    <p>Adresse: <?php echo $etudiantInfo['ADRESSEE']; ?></p>
    <!-- Ajoutez d'autres informations à afficher -->
</div>
</body>
</html>
