<?php
session_start();
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
}
require_once("../controller/connexionbase.php");
require_once("../model/emprunter.php");
require_once("../model/livre.php");
require_once("header.php");
$book = new livres();
$listebook=$book->read();
require_once("../model/etudiant.php");
$eleve = new Etudiant();
$liste_eleve=$eleve->read();

?>
<small>Vous êtes connecté en tant que <?php echo $_SESSION["membres_connecte"]; ?></small>
<div class="container h-100">

<h1 class="text-center text-danger">Emprunter une livre </h1><hr class="col-4">

<!---formulaire-->
<form  action="../controller/empruntcontrol.php" class="jumbotron" method="POST"><br>
<h2 class="text-left text-danger"> Choisir votre livre</h2><hr class="col-4">
  <div class="form-group">       
             <!-- selction du livre-->
          <div class="col-lg-5"><br>
            <label><h2><u class="text-center text-info">Selectioner votre livre : </u></h2> </label><br><br>
            <select class="text-center" name="idl" id="">
<?php 
foreach($listebook as $book){
?>
 <option value="<?php echo $book["IDL"]; ?>">
<?php  echo $book["TITRE"]?>
</option>
<?php }?>
          </select></div><br>
          <!--fin selction du livre-->  
               
               <!---date de retour ----->
 <div class="col-lg-6">
          <label ><h2><u class="text-center text-info">Selectioner votre date de retour : </u></h2></label>
    <input type="date" class="form-control" placeholder="" name="date_retour">
          </div>
        
          <!-- fin date de retour----->

               </div><br><br>
<!--fin formulaire-->

<!---bouton d enregistrement--->
<button class="btn btn-info btn-lg activ float-right " name="emprunter">Emprunter</button>
</div>

<br>
</form>
</div>

