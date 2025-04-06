<?php 
$title="Inscription etudiant ou teacher";
require_once "header.php";
require_once "../model/admine.php";
$voiture = new Admine();
$listevoiture=$voiture->read();
?>

<div class="container h-100">

<h1 class="text-center text-danger">Veiller remplir tous les formulaires </h1><hr class="col-4">
<a href="inscription.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
<!---formulaire-->
<form  action="../controller/etudiantcontrol.php" class="jumbotron" method="POST"><br>
<h2 class="text-left text-danger">Vos information</h2><hr class="col-4">
  <div class="form-group">
      <div class="row">
          <div class="col-lg-6">
          <label >Nom :</label>
    <input type="text" class="form-control" placeholder="" name="nome">
          </div>

          <div class="col-lg-6">
          <label >Prenom:</label>
    <input type="text" class="form-control" placeholder="" name="prenome">
          </div>
          <div class="col-lg-6">
          <label >Date de naissance:</label>
    <input type="date" class="form-control" placeholder="" name="agee">
          </div>
          <div class="col-lg-6">
          <label >Niveau:</label>
    <input type="tel" class="form-control" placeholder="" name="niveaue">
          </div>
          <div class="col-lg-6">
          <label >Adresse</label>
    <input type="text" class="form-control" placeholder="" name="adressee">
          </div>
          <div class="col-lg-6">
          <label >Numero:</label>
    <input type="tel" class="form-control" placeholder="" name="nume">
          </div>
          <div class="col-lg-6">
          <label >Photo d'identite:</label>
    <input type="file" class="form-control" placeholder="" name="photoe">
          </div>
             <!-- selction admin-->
          <div class="col-lg-3"><br>
            <label>Choisir votre adminstrateur</label>
            <select class="text-center" name="ida" id="">
<?php 
foreach($listevoiture as $v){
?>
 <option value="<?php echo $v["IDA"]; ?>">
<?php  echo $v["NOMAD"]?>
</option>
<?php }?>
          </select></div>
          <!--fin selction admin-->  
               
               <!---compte de connexion----->
               <div class="col-lg-12"><h2 class="text-left text-danger">Votre compte de connexion</h2><hr class="col-4"><br></div>
 <div class="col-lg-6">
          <label >Pseudo:</label>
    <input type="text" class="form-control" placeholder="" name="pseudoe">
          </div>
          <div class="col-lg-6">
          <label >Mot de Passe:</label>
    <input type="password" class="form-control" placeholder="" name="mdpe">
          </div>
          <div class="col-lg-6">
          <label >confirmer votre mot de passe:</label>
    <input type="password" class="form-control" placeholder="" name="confirm_mdpe">
          </div>
          <!-- fin -compte de connexion----->
               </div><br><br>
<!--fin formulaire-->

<!---bouton d enregistrement--->
<button class="btn btn-info btn-lg activ float-right " name="ajoutet">Enregistrer</button>
</div>

<br>
</form>
</div>
