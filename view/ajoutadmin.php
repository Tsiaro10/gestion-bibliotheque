<?php 
$title="Inscription etudiant ou teacher";
require_once "header.php";

?>

<div class="container h-100">

<h1 class="text-center text-danger">Entrer les informations </h1><hr class="col-4">

<!---formulaire-->
<form  action="../controller/admincontrol.php" class="jumbotron" method="POST"><br>
<h2 class="text-left text-danger"> Ajouter une Administrateur</h2><hr class="col-4">
  <div class="form-group">
      <div class="row">
          <div class="col-lg-6">
          <label >Nom :</label>
    <input type="text" class="form-control" placeholder="" name="nomad">
          </div>

          <div class="col-lg-6">
          <label >Prenom:</label>
    <input type="text" class="form-control" placeholder="" name="prenoma">
          </div>
          <div class="col-lg-6">
          <label >Date de naissance:</label>
    <input type="date" class="form-control" placeholder="" name="agea">
          </div>
          <div class="col-lg-6">
          <label >Photo d'identite:</label>
    <input type="file" class="form-control" placeholder="" name="photoa">
          </div>
             
               
               <!---compte de connexion----->
               <div class="col-lg-12"><h2 class="text-left text-danger">Votre compte de connexion</h2><hr class="col-4"><br></div>
 <div class="col-lg-6">
          <label >Pseudo:</label>
    <input type="text" class="form-control" placeholder="" name="pseudoa">
          </div>
          <div class="col-lg-6">
          <label >Mot de Passe:</label>
    <input type="password" class="form-control" placeholder="" name="mdpa">
          </div>
          <!-- fin -compte de connexion----->
               </div><br><br>
<!--fin formulaire-->

<!---bouton d enregistrement--->
<button class="btn btn-info btn-lg activ float-right " name="ajoutet">Enregistrer</button>
<button class="btn btn-info btn-lg activ float-right " name="">Voir liste</button>
</div>

<br>
</form>
</div>
