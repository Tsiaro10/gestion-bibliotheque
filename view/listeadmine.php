<?php 
require_once("../model/admine.php");
$admine = new Admine();
$liste_admine = $admine->read();
$title="Liste d'administrateur";
require_once("header2.php");
?>

            <h1 class="text-center"><u class="text-info">Liste des administrateur</u></h1>
            
            <div class="container jumbotron h-100">
            <a href="admin.php" class="btn btn-danger btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
    <table class="table table-bordered text-center">
    <thead>
    <tr>

      <th class="text-center">Photo</th>
      <th class="text-center" >Nom</th> 
      <th class="text-center" >Prenom</th>    
      <th class="text-center">Date de naissance</th>
      <th class="text-center">Matricule</th>
       
    </tr>
    <ul>
    <?php
        foreach($liste_admine as $e) {
    ?>
    
      
    </thead>
    <tbody>
    <tr>
        <td> <img src="img/<?php echo $e["PHOTOA"];?>" alt="" srcset="" class="img-circle  img-responsive h-50"></td>      
        <td><?php echo $e["NOMAD"]; ?></td>
        <td>  <?php echo $e["PRENOMA"]; ?></td>
        <td><?php echo $e["AGEA"];?></td>
        <td><?php echo $e["IDA"]; ?></td>
               
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