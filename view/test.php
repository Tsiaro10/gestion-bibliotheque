<?php 
require_once("../model/emprunter.php");
require_once("../model/livre.php");
require_once("../model/etudiant.php");

// Récupérer la liste des livres
$livre = new Livres();
$listeLivres = $livre->read();

// Récupérer la liste des étudiants
$etudiant = new Etudiant();
$listeEtudiants = $etudiant->read();

// Récupérer la liste des emprunts
$emprunt = new Emprunter();
$listeEmprunts = $emprunt->read();

// Définition du titre de la page
$title = "Liste des Livres";

require_once("header2.php");
?>

<h1 class="text-center"><u class="text-info">TOUS LES LIVRES</u></h1>
<div class="container jumbotron">
    <a href="adminvue.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a>
    <br><br>
    <table class="table table-bordered text-center">
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
    // Initialiser une variable pour stocker les noms des emprunteurs
    $emprunteurs = "";
    
    // Parcourir la liste des emprunts pour trouver les emprunteurs de ce livre
    foreach ($listeEmprunts as $emprunt) {
        if ($emprunt["IDL"] == $livre["IDL"]) {
            foreach ($listeEtudiants as $etudiant) {
                if ($etudiant["IDE"] == $emprunt["IDE"]) {
                    // Ajouter le nom de l'emprunteur à la liste
                    $emprunteurs .= $etudiant["NOME"] . ", ";
                }
            }
        }
    }
    
    // Supprimer la virgule et l'espace en trop à la fin de la liste
    $emprunteurs = rtrim($emprunteurs, ", ");
    
    // Afficher la liste des emprunteurs
    echo $emprunteurs != "" ? $emprunteurs : "Non emprunté";
    ?>
</td>


    </tr>
<?php endforeach; ?>

<td></td>

        </tbody>
    </table>
</div>
