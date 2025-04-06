<?php 
session_start();

require_once("../model/etudiant.php");
if(!isset($_SESSION["ida"])) {
  header("Location: inscription.php");
  exit;}

$eleve = new Etudiant();
$liste_eleve = $eleve->read();
$title="Liste de eleve";
require_once("header2.php");
?>

            <h1 class="text-center"><u class="text-info">Liste des Etudiants</u></h1>
            
            <div class="container jumbotron h-100">
            <a href="interface_admine.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
    <table class="table table-bordered text-center">
    <thead>
    <tr>
     <th class="text-center">Photo</th>
        
      <th class="text-center" >Nom et Prenom</th>    
        <th class="text-center">Date de naissance</th>
        <th class="text-center">Niveau</th>
        <th class="text-center">Adresse</th>
        <th class="text-center">Numero</th>
        <th class="text-center">Matricule</th>
        <th class="text-center">Action</th>
       

      </tr>
    <ul>
    <?php
        foreach($liste_eleve as $e) {
    ?>
    
      
    </thead>
    <tbody>
    <tr>
    <td> <img src="img/<?php echo $e["PHOTOE"];?>" alt="" srcset="" class="img-circle  img-responsive h-50"></td>
        <td><?php echo $e["NOME"]; ?>  <?php echo $e["PRENOME"]; ?></td>
        <td><?php echo $e["AGEE"];?></td>
        <td><?php echo $e["NIVEAUE"];?></td>
        <td><?php echo $e["ADRESSEE"];?></td>
        <td>0<?php echo $e["NUME"];?></td>
        <td><?php echo $e["IDE"]; ?></td>
        <td>
                    <!-- icônes d'édition et de suppression -->
                    
    <a href="modifier_voyageur.php?idv=<?php echo $e['IDE']; ?>"><i class="fa fa-edit"></i></a>

                    <a href="../controller/supprimer_etudiant.php?sup=<?php echo $e["IDE"]; ?>"><i class="fa fa-trash-o"></i></a>
                    <!-- fin icônes d'édition et de suppression -->
                </td>
       
      </tr>     
      
    
  <?php
        }
    ?>
  </ul>
  </tbody>
  </table>
  </div>
</body>
</html>