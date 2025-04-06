<link rel="stylesheet" href="css/ba.css">
<?php 
session_start();
$title="PAGE | ADMIN";
require_once ("header.php");
require_once "../model/admine.php";
if(!isset($_SESSION["ida"])) {
  header("Location: inscription.php");
  exit; // Il est recommandé de terminer le script après une redirection
}
$admin = new Admine();
$listeadmin=$admin->read();
?>

<div class="container admin ">
    <h1 class="text-center text-danger">ADMINISTRATEUR DE BIBLIOTHEQUE</h1><hr>
</div>
<div class="container h-200">
    <!-- admin--->
    <div class="col-lg-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 TEST
</button>
    </div>
    <div class="col-lg-9"></div><br>
                <!-- add book---->
    <div class="col-lg-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addbook"> ADD NEW BOOK</button>
                <!-- Modal -->
<div class="modal fade" id="addbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gestion de livre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container h-100">

<h1 class="text-center text-danger"> Gestion de livre </h1><hr class="col-4">

<!---formulaire-->
<form  action="../controller/livrecontroller.php" class="jumbotron" method="POST"><br>
<h2 class="text-left text-danger"> Ajouter une nouvelle livre</h2><hr class="col-4">
  <div class="form-group">
      <div class="row">
          <div class="col-lg-12">
          <label >Nom du livre:</label>
    <input type="text" class="form-control" placeholder="" name="titre">
          </div>

          <div class="col-lg-12">
          <label >Auteur:</label>
    <input type="text" class="form-control" placeholder="" name="auteur">
          </div>
          <div class="col-lg-12">
          <label >Annee:</label>
    <input type="date" class="form-control" placeholder="" name="annee">
          </div>
          <div class="col-lg-12">
          <label >ISBN:</label>
    <input type="tel" class="form-control" placeholder="" name="isbn">
          </div>
          <div class="col-lg-12">
          <label >Quantite du livre</label>
    <input type="text" class="form-control" placeholder="" name="quantitel">
          </div>
          <div class="col-lg-12">
          <label >IMAGE</label>
    <input type="file" class="form-control" placeholder="" name="imagel">
          </div>
          <div class="col-lg-12">
          <label >Etrer une simple resumé du livre</label>
    <input type="text" class="form-control" placeholder="" name="resumel">
          </div>
          <!-- selction admin-->
          <div class="col-lg-12"><br>
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
<br>
<!---bouton d enregistrement--->
<button class="btn btn-info btn-lg activ float-right " name="bouton">Enregistrer</button>
</div>

<br>
</form>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                <!--   fin Modal -->
    </div>
    <div class="col-lg-9"></div><br>
                 <!-- fin  add book---->


                  <!--Liste livres-->
                <div class="container h-100">

                <div class="col-lg-3">
    
<!-- Button liste livre -->
<a href="liste_livre_admine.php">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="listelivre" value="btn">
  LISTE LIVRES
</button></a>
    </div>
    <div class="col-lg-9"></div><br>
    <!-- fin Liste livres-->


            <!-----ajouter etudiant---->


<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addetudiant">
  ADD ETUDIENT
</button>

<!-- Modal -->
<div class="modal fade" id="addetudiant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<h1 class="text-center text-danger">Entrer les informations </h1><hr class="col-4">

<!---formulaire-->
<form  action="../controller/etudiantcontrol.php" class="jumbotron" method="POST"><br>
<h2 class="text-left text-danger"> Ajouter une nouvelle etudiant</h2><hr class="col-4">
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
          <!-- fin -compte de connexion----->
               </div><br><br>
<!--fin formulaire-->

<!---bouton d enregistrement--->
<button class="btn btn-info btn-lg activ float-right " name="ajoutet">Enregistrer</button>

</div>

<br>
</form>
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
            

           <!-- ======log out======= -->   

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
</div></div>