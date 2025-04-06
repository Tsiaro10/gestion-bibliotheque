<?php
session_start();
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
}
require_once("../model/livre.php");

$title="Page | Livres";

//  Livres
$livre = new Livres();
$listeLivresDisponibles = $livre->getLivresDisponibles();

require_once("header.php");

?>

<!----titre-->
<div class="container">
      <br>
      <h1 class="text-center text-danger">TOUS LES LIVRES DISPONIBLES</h1><hr><br>
      <a href="interface_etudiant.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
</div><br>
<!---- fin titre-->

<div class="container">
  <div class="row jumbotron">
  
    <table class="table table-bordered text-center">
    <thead>
    <tr>
    </tr>
    <ul>
   
    <?php
        foreach($listeLivresDisponibles as $e) {
    ?>
      
    </thead>
    <tbody>
    <tr>
      <td>

            <!---tableau de livres-->
<form action="../controller/controllivre.php" class="" method="POST">
  <div class="col_lg_12">
    <div class="col-lg-6">
      <h5 class="text-danger">Titre: <u class="text-info"> <?php echo $e["TITRE"]; ?> </u> </h5>
      <img src="img/<?php echo $e["IMAGEL"]; ?>" alt="" srcset="" class="img-circle  img-responsive h-50">
    
    </div></td>

    <!---information--->

    <td>
    <div class="col-lg-6">
    
    <p>cette livre a ete cree par <u class="text-info"><?php echo $e["AUTEUR"]; ?></u></p>
      <p>Année : <u class="text-info"><?php echo $e["ANNEE"]; ?></u></p>
      <p>Votre numero isbn est le <u class="text-info"><?php echo $e["ISBN"]; ?></u></p>
    </div>
    </td>

    <!-- disponiblite-->
    <div class="col-lg-3">

           <!---teste bouton emprunter--->

           <td><br><br>

           <!-- Ajoutez un champ caché pour stocker les informations du livre -->

           <input type="hidden" name="livre_id" value="<?php echo $e["IDL"]; ?>">
           <input type="hidden" name="livre_titre" value="<?php echo $e["TITRE"]; ?>">
           <input type="hidden" name="livre_auteur" value="<?php echo $e["AUTEUR"]; ?>">
           <input type="hidden" name="livre_annee" value="<?php echo $e["ANNEE"]; ?>">
           <input type="hidden" name="livre_isbn" value="<?php echo $e["ISBN"]; ?>">
           <input type="hidden" name="livre_quantite" value="<?php echo $e["QUANTITEL"]; ?>">
           <button class="btn btn-danger" name="emprunt">Emprunter</button>   </form><BR></BR>              
           </td>
        <!--- fin teste bouton emprunter---> 
        
    </div>
 
    
             <!--- fin tableau de livres-->
       </td>
      </tr>     
      
    
  <?php
        }
    ?>
   
  </ul>
</form>
  </tbody>
  </table>
  </div> 
  </div>
</div>

<div>
  <!--------=== modal emprunter==----->
 <div class="col-lg-3">
          <!-- Modal -->
<div class="modal fade" id="addbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <!-- Formulaire de réservation -->
        <form action="../controller/controllivre.php" class="jumbotron" method="POST">
          <?php
          foreach($listeLivresDisponibles as $e) {
              // Afficher les informations du livre
              echo "<p>ID du livre: " . $e["IDL"] . "</p>";
              echo "<p>Titre du livre: " . $e["TITRE"] . "</p>";
              // Autres informations du livre...
          ?>
          <h2 class="text-left text-danger"> Remplir l'information suivante</h2><hr class="col-4">
          <div class="form-group">       
            <!-- Date de reservation -->
            <div class="col-lg-12">
              <label><h2><u class="text-center text-info">Date de reservation : </u></h2></label>
              <input type="date" class="form-control" placeholder="" name="date_reserve">
            </div>
            <!-- Heure de reservation -->
            <div class="col-lg-12">
              <label><h2><u class="text-center text-info">Heure de reservation : </u></h2></label>
              <input type="time" class="form-control" placeholder="" name="heure_reserve">
            </div>
            <!-- Date de retour -->
            <div class="col-lg-12">
              <label><h2><u class="text-center text-info">Date de retour : </u></h2></label>
              <input type="date" class="form-control" placeholder="" name="retour">
            </div>
            <!-- Champs cachés pour les informations du livre -->
            <input type="hidden" name="livre_id" value="<?php echo $e["IDL"]; ?>">
            <input type="hidden" name="livre_titre" value="<?php echo $e["TITRE"]; ?>">
            <input type="hidden" name="livre_auteur" value="<?php echo $e["AUTEUR"]; ?>">
            <input type="hidden" name="livre_annee" value="<?php echo $e["ANNEE"]; ?>">
            <input type="hidden" name="livre_isbn" value="<?php echo $e["ISBN"]; ?>">
            <input type="hidden" name="livre_quantite" value="<?php echo $e["QUANTITEL"]; ?>">
          </div><br><br>
          <!-- Bouton de réservation -->
          <button class="btn btn-info btn-lg activ float-right" name="reserver">Reserver</button>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>
</div>

<!--   fin Modal -->
</body>
</html>
