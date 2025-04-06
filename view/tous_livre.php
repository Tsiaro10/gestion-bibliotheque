<?php
require_once("../model/livre.php");

$voiture = new Livres();
$listevoiture = $voiture->read();
$title="Page | Livres";
require_once("../view/header.php");
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
        <!----titre-->
<div class="container">
      <br>
      <h1 class="text-center text-danger">TOUS LES LIVRES</h1><hr><br>
      <a href="etudiantvue.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
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
        foreach($listevoiture as $e) {
    ?>
      
    </thead>
    <tbody>
    <tr>
      <td>
            <!---tableau de livres-->
<form action="../controller/controllivre.php" class="" method="POST">
    <div class="col-lg-3">
      <h5 class="text-danger">Titre: <u class="text-info"> <?php echo $e["TITRE"]; ?> </u> </h5>
      <img src="img/<?php echo $e["IMAGEL"]; ?>" alt="" srcset="" class="img-circle  img-responsive h-50">
    
    </div>
    <!---information--->

    <div class="col-lg-6">
      <br><br>
    <p>cette livre a ete cree par <u class="text-info"><?php echo $e["AUTEUR"]; ?></u></p>
      <p>Année : <u class="text-info"><?php echo $e["ANNEE"]; ?></u></p>
      <p>Votre numero isbn est le <u class="text-info"><?php echo $e["ISBN"]; ?></u></p>
    </div>
    </form>
    
             <!--- fin tableau de livres-->
       </td>
      </tr>     
      
    
  <?php
        }
    ?>
   
  </ul>
  </tbody>
  </table>
  
  </div>
</div>

</body>
</html>
