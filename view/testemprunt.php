<?php 
$title="TEST";
require_once "header.php";
require_once "../model/livre.php";
$book = new Livres();
$listebook=$book->read();
require_once "../model/Etudiant.php";
$eleve = new Etudiant();
$liste_eleve=$eleve->read();
?>

<div class="container h-100">

<h1 class="text-center text-danger">Entrer les informations </h1><hr class="col-4">

<!---formulaire-->
<!---formulaire-->
<form  action="../controller/empruntcontrol.php" class="jumbotron" method="POST"><br>
<h2 class="text-left text-danger"> Ajouter une Administrateur</h2><hr class="col-4">
  <div class="form-group">
      <div class="row">
         
          <div class="col-lg-6">
          <label >Date de retour:</label>
    <input type="date" class="form-control" placeholder="" name="date_retour">
          </div>

</div>
</div>
          <button class="btn btn-info btn-lg activ float-right " name="emprunter">Enregistrer</button>

</form>     

<!--fin formulaire-->
</div>
