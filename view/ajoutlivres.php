<?php 
$title="Ajouter une livre";
require_once "header.php";
require_once "../model/admine.php";
$admin = new Admine();
$listeadmin=$admin->read();

?>

<div class="container h-100">

<h1 class="text-center text-danger"> Gestion de livre </h1><hr class="col-4">

<!---formulaire-->
<form  action="../controller/livrecontroller.php" class="jumbotron" method="POST"><br>
<h2 class="text-left text-danger"> Ajouter une nouvelle livre</h2><hr class="col-4">
  <div class="form-group">
      <div class="row">
          <div class="col-lg-3">
          <label >Nom du livre:</label>
    <input type="text" class="form-control" placeholder="" name="titre">
          </div>

          <div class="col-lg-3">
          <label >Auteur:</label>
    <input type="text" class="form-control" placeholder="" name="auteur">
          </div>
          <div class="col-lg-3">
          <label >Annee:</label>
    <input type="date" class="form-control" placeholder="" name="annee">
          </div>
          <div class="col-lg-3">
          <label >ISBN:</label>
    <input type="tel" class="form-control" placeholder="" name="isbn">
          </div>
          <div class="col-lg-3">
          <label >IMAGE</label>
    <input type="file" class="form-control" placeholder="" name="imagel">
          </div>
          <div class="col-lg-3">
          <label >Quantite du livre</label>
    <input type="text" class="form-control" placeholder="" name="quantitel">
          </div>
          <div class="col-lg-3">
          <label >Etrer une simple resumé du livre</label>
    <input type="text" class="form-control" placeholder="" name="resumel">
          </div>
          <!-- selction admin-->
          <div class="col-lg-3"><br>
            <label>GERER PAR QUI</label>
            <select class="text-center" name="ida" id="">
<?php 
foreach($listeadmin as $v){
?>
 <option value="<?php echo $v["IDA"]; ?>">
<?php  echo $v["NOMAD"]?>
</option>
<?php }?>
          </select></div>
          <!--fin selction admin-->
               </div>
<!--fin formulaire-->

<!---bouton d enregistrement--->
<br><br>
<button class="btn btn-info btn-lg activ float-right " name="bouton">Enregistrer</button>
</div>

<br>
</form>
</div>
