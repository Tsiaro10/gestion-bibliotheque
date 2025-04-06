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
<!----titre-->
<div class="container">
    <br>
    <h1 class="text-center text-danger">TOUS LES LIVRES</h1><hr><br>
    <a href="adminvue.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
</div><br>
<!---- fin titre-->
<div class="container">
    <div class="row jumbotron">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center">Titre</th>
                    <th class="text-center">Auteur</th>
                    <th class="text-center">Année</th>
                    <th class="text-center">ISBN</th>
                    <th class="text-center">Emprunteur</th>
                    <th class="text-center">Disponibilité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listeLivres as $e) : ?>
                    <tr>
                        <td><?php echo $e["TITRE"]; ?></td>
                        <td><?php echo $e["AUTEUR"]; ?></td>
                        <td><?php echo $e["ANNEE"]; ?></td>
                        <td><?php echo $e["ISBN"]; ?></td>
                        <td>
                            <?php
                            $emprunteur = "Non emprunté";
                            foreach ($listeEmprunts as $emprunt) {
                                if ($emprunt["IDL"] == $e["IDL"]) {
                                    foreach ($listeEtudiants as $etudiant) {
                                        if ($etudiant["IDE"] == $emprunt["IDE"]) {
                                            $emprunteur = $etudiant["NOME"];
                                            break 2;
                                        }
                                    }
                                }
                            }
                            echo $emprunteur;
                            ?>
                        </td>
                        <td>
                            <?php
                            $estEmprunte = false;
                            foreach ($listeEmprunts as $emprunt) {
                                if ($emprunt["IDL"] == $e["IDL"]) {
                                    $estEmprunte = true;
                                    break;
                                }
                            }
                            if ($estEmprunte) {
                                echo "Déjà emprunté";
                            } else {
                                echo "Disponible";
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
