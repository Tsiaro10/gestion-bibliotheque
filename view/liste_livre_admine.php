<?php 
require_once("../model/emprunter.php");
require_once("../model/livre.php");
require_once("../model/etudiant.php");

//  liste des livres
$livre = new Livres();
$listeLivres = $livre->read();

//  liste des étudiants
$etudiant = new Etudiant();
$listeEtudiants = $etudiant->read();

//  liste des emprunts
$emprunt = new Emprunter();
$listeEmprunts = $emprunt->read();

$title = "Liste des Livres";
require_once("header2.php");

?>

<h1 class="text-center"><u class="text-info">TOUS LES LIVRES</u></h1>



<div class="container jumbotron">
    <a href="interface_admine.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a>
    <br><br>
    <table class="table table-bordered text-center">
            <!-- etude de fonction cheercher!-->
    <!-- Dans le formulaire existant -->
<form action="../controller/chercher_livre.php" method="POST">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Rechercher un livre..." name="search">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
        </div>
    </div>
</form>

    <!-- etude de fonction cheercher!-->
        <thead>
            <tr>
                <th class="text-center">PHOTO</th>
                <th class="text-center">Titre</th>
                <th class="text-center">Auteur</th>
                <th class="text-center">Sortie</th>
                <th class="text-center">ISBN</th>
                <th class="text-center">QUANTITE</th>
                <th class="text-center">Emprunteur</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($listeLivres as $livre) : ?>
    <tr>
        <td> <img src="img/<?php echo $livre["IMAGEL"]; ?>" alt="" srcset="" class="img-circle  img-responsive h-50"></td>
        <td><?php echo $livre["TITRE"]; ?></td>
        <td><?php echo $livre["AUTEUR"]; ?></td>
        <td><?php echo $livre["ANNEE"]; ?></td>
        <td><?php echo $livre["ISBN"]; ?></td>
        <td><?php echo $livre["QUANTITEL"]; ?></td>
        <td>
    <?php
    
    $emprunteurs = "";
    
    
    foreach ($listeEmprunts as $emprunt) {
        if ($emprunt["IDL"] == $livre["IDL"]) {
            foreach ($listeEtudiants as $etudiant) {
                if ($etudiant["IDE"] == $emprunt["IDE"]) {
                    
                    $emprunteurs .= $etudiant["NOME"] . ", ";

                }
            }
        }
    }
    
    
    $emprunteurs = rtrim($emprunteurs, ", ");
    
    
    echo $emprunteurs != "" ? $emprunteurs : "Non emprunté";
    ?>
</td>


    </tr>
<?php endforeach; ?>

<td></td>

        </tbody>
    </table>
</div>
