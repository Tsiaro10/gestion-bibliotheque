<link rel="stylesheet" href="css/interface_etudiant.css">
<?php 
require_once ("header_interface.php");

session_start();

require_once("../model/etudiant.php");
if(!isset($_SESSION["ida"])) {
  header("Location: inscription.php");
  exit; // Il est recommandé de terminer le script après une redirection
}
require_once "../model/admine.php";
$admin = new Admine();
$listeadmin=$admin->read();
?>

  <?php 


// Créez une instance de la classe Etudiant
$etudiant = new Admine();

// Obtenez les informations de l'étudiant en fonction de son identifiant de session
$etudiantInfo = $etudiant->get_admine_info($_SESSION["ida"]);

$title="PROFIL";
require_once("header.php");
?>
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<!--- ==== header===== -->
<header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
      <h1 class="text-right text-danger"><u>ADMINISTRATEUR</u></h1>
        <img src="img/<?php echo $etudiantInfo['PHOTOA']; ?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"><?php echo $etudiantInfo['NOMAD']; ?>  <?php echo $etudiantInfo['PRENOMA']; ?></a></h1>
      
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li ><a href="liste_livre_admine.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>TOUS LES LIVRES</span></a></li>

          <li><a href="notification_emprunter.php" class="nav-link scrollto"><i class="bi bi-bell-fill"></i> <span>ACTIVITE</span></a></li>
          <li><a href="liste_etudiant.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>LISTE ETUDIANT</span></a></li>
          <li><a href="ajoutlivres.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Nouvelle livre</span></a></li>
          <li><a href="inscription.php" class="nav-link scrollto"><i class="bi bi-box-arrow-in-left"></i> <span>LOGOUT</span></a></li>
  
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  
  <!-- ======= WELCOME ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1 class="text-center text-danger">BIENVENUE CHEF</h1>
      <p class="text-center"><u>Votre activite:</u><span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
      <ul>
        <li>voir tous les listes des livres avec leur quantite</li>
        <li>Action concernant du livre </li>
        <li>Supprimer une livre </li>
        <li>refuser une reservation </li>
        <li>Consulter liste etudiant</li>

    </ul>
    </div>
  </section><!-- End WELCOME -->

  