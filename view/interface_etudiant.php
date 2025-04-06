<link rel="stylesheet" href="css/interface_etudiant.css">
<?php 
require_once ("header_interface.php");

session_start();

require_once("../model/etudiant.php");
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
  exit; }
require_once "../model/admine.php";
$admin = new Admine();
$listeadmin=$admin->read();
?>

  <?php 


// Créez une instance de la classe Etudiant
$etudiant = new Etudiant();
$etudiantInfo = $etudiant->get_student_info($_SESSION["ide"]);

$title="PROFIL";
require_once("header.php");
?>
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<!--- ==== header===== -->
<header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
      <h1 class="text-right text-danger"><u>Etudiant</u></h1>
        <img src="img/<?php echo $etudiantInfo['PHOTOE']; ?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"><?php echo $etudiantInfo['NOME']; ?>  <?php echo $etudiantInfo['PRENOME']; ?></a></h1>
      
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="liste_livre_etudiant.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>TOUS LES LIVRES</span></a></li>
          <li><a href="liste_livre_disponible.php" class="nav-link scrollto"><i class="bi bi-list"></i><span>LIVRES DISPONIBLES</span></a></li>
          <li><a href="reservation.php" class="nav-link scrollto"><i class="bi bi-grid-3x3-gap"></i> <span>RESERVER UNE LIVRES</span></a></li>
          <li><a href="liste_livre_emprunter.php" class="nav-link scrollto"><i class="bi bi-receipt-cutoff"></i><span>LIVRES EMPRUNTER</span></a></li>
          <li><a href="livre_reserver.php" class="nav-link scrollto"><i class="bi bi-bookmark-star-fill"></i> <span>LIVRES RESERVER</span></a></li>
          <li><a href="inscription.php" class="nav-link scrollto"><i class="bi bi-box-arrow-in-left"></i> <span>LOGOUT</span></a></li>
        </ul>
      </nav>

    </div>
  </header>
  

  
  <!-- ======= WELCOME ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1 class="text-center text-danger">WELCOME <br> IN TE BIBLIOTHEQUE</h1>
      <p class="text-center"><u>Voici l'utilisation de ce site web:</u><span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
      <ul>
        <li>voir tous les livres</li>
        <li>emprunter une livre</li>
        <li>reserver une livre</li> 
         <li>retour du livre</li>
    </ul>
    </div>
  </section><!-- End WELCOME -->