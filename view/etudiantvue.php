<link rel="stylesheet" href="css/back.css">
<?php 
session_start();

require_once("../model/etudiant.php");
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
  exit; // Il est recommandé de terminer le script après une redirection
}
$title="PAGE | ETUDIANT";
require_once ("header.php");
require_once "../model/admine.php";
$admin = new Admine();
$listeadmin=$admin->read();
?>

<div class="container admin">
    <h1 class="text-center text-danger">COMPTE ETUDIANT</h1><hr>
</div>
<div class="container h-200">

<!--------------------------------------------------------------------------------------------------->

    <!-- profil--->
     


<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addetudiant">
  PROFIL
</button>

<!-- Modal -->
<div class="modal fade" id="addetudiant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

                          

                            <div class="modal-body">  
<div class="container h-100">

<h1 class="text-center text-danger">VOTRE PROFIL </h1><hr class="col-4">
<?php 


// Créez une instance de la classe Etudiant
$etudiant = new Etudiant();

// Obtenez les informations de l'étudiant en fonction de son identifiant de session
$etudiantInfo = $etudiant->get_student_info($_SESSION["ide"]);

$title="PROFIL";
require_once("header.php");
?>

<div class="container jumbotron h-100">  
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


</div>
 </div>


                          
   
    </form></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div><br><br>

<!--   fin Modal -->

            <!----fin d'ajouter etudiant---->

   <!--  fin du profil--->
       


   <!------------------------------------------------------------------------------------------------>

                  <!--Liste livres-->
                <div class="container h-100">

                <div class="col-lg-3">
    
<!-- Button liste livre -->
<a href="tous_livre.php">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="listelivre" value="btn">
TOUS LES LIVRES
</button></a>
    </div>
    <div class="col-lg-9"></div><br>
    <!-- fin Liste livres-->


            <!-----ajouter etudiant---->


<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#livredispo">
LIVRES DISPONIBLE
</button>

<!-- Modal -->
<div class="modal fade" id="livredispo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

                            <!----formulaire d'ajouter un etudiant--->

                            <div class="modal-body">  
<div class="container h-100">

<h1 class="text-center text-danger">livres disponibles </h1><hr class="col-4">


</div>
 </div>


                            <!---- fin formulaire d'ajouter un etudiant--->
   
    </form></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div><br><br>

<!--   fin Modal -->

            <!----fin d'ajouter etudiant---->
            <div class="col-lg-3">
    
    <!-- Button liste livre -->
    <a href="liste_etudiant.php">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="listelivre" value="btn">
      LISTE ETUDIANT
    </button></a>
        </div>
        <div class="col-lg-9"></div><br>
         <!----fin d'ajouter etudiant---->

         <div class="col-lg-3">
    <!-- Button liste livre -->
    <a href="liste_livre_disponible.php">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="listelivre" value="btn">
      LIVRE DISPO
    </button></a>
        </div>
        <div class="col-lg-9"></div><br>

        
        <div class="col-lg-3">
    <!-- Button liste livre -->
    <a href="inscription.php">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="listelivre" value="btn">
      LOGOUT
    </button></a>
        </div>
        <div class="col-lg-9"></div>

          </div>
</div>
