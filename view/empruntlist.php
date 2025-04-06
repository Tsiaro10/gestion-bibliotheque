<?php
require_once("../model/emprunter.php");
require_once("../model/livre.php");
require_once("header2.php");

// Instanciation d'un nouvel objet livre
$livre = new Livres();
$listeLivres = $livre->read();

// Instanciation d'un nouvel objet étudiant
require_once ("../model/etudiant.php");
$etudiant = new Etudiant();
$listeEtudiants = $etudiant->read();

require_once("../model/emprunter.php");

// Définition du titre de la page
$title = "Liste des Emprunts";

require_once("header2.php");

// Instanciation d'un nouvel objet emprunter
$emprunt = new Emprunter();
$listeEmprunts = $emprunt->read();
?>

<h1 class="text-center"><u class="text-info">Liste des Emprunts</u></h1>

<div class="container jumbotron h-100">
    <a href="adminvue.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th class="text-center">Emprunteur</th>
                <th class="text-center">livre</th>
                <th class="text-center">Date d'emprunt</th>
                <th class="text-center">Heure d'emprunt</th>
                <th class="text-center">Date de retour</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listeEmprunts as $emprunt) : ?>
                <tr>
                    <td>
                        <?php
                        // Recherche de l'étudiant associé à cet emprunt
                        foreach ($listeEtudiants as $etudiant) {
                            if ($etudiant["IDE"] == $emprunt["IDE"]) {
                                echo $etudiant["NOME"];
                                break; // Arrêter la boucle une fois qu'on a trouvé l'étudiant
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        // Recherche de l'étudiant associé à cet emprunt
                        foreach ($listeLivres as $livres) {
                            if ($livres["IDL"] == $emprunt["IDL"]) {
                                echo $livres["TITRE"];
                                break; // Arrêter la boucle une fois qu'on a trouvé l'étudiant
                            }
                        }
                        ?>
                    </td>
                    <td><?php echo $emprunt["DATE_EMPRUNT"]; ?></td>
                    <td><?php echo $emprunt["HEURE_EMPRUNT"]; ?></td>
                    <td><?php echo $emprunt["DATE_RETOUR"]; ?></td> <!-- Ajout de la date de retour -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
