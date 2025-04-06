<?php 
$title="notification";
require_once("header2.php");
require_once("../model/emprunter.php");
require_once("../model/etudiant.php");
require_once("../model/livre.php");
session_start();

// Fonction de comparaison pour trier les emprunts par date et heure
function comparerEmprunts($a, $b) {
    $dateA = strtotime($a["DATE_EMPRUNT"] . ' ' . $a["HEURE_EMPRUNT"]);
    $dateB = strtotime($b["DATE_EMPRUNT"] . ' ' . $b["HEURE_EMPRUNT"]);
    if ($dateA == $dateB) {
        return 0;
    }
    return ($dateA > $dateB) ? -1 : 1;
}

// Récupération de la liste d'emprunts
$emprunt = new Emprunter();
$liste_emprunt = $emprunt->read();

// Tri de la liste des emprunts en utilisant la fonction de comparaison
usort($liste_emprunt, "comparerEmprunts");

// Récupération de la liste des étudiants
$etudiant = new Etudiant();
$liste_etudiants = $etudiant->read();

// Récupération de la liste des livres
$livre = new Livres();
$liste_livres = $livre->read();
?>
<div class="container jumbotron">
<h3 class="text-center text-danger"><u>RAPPORT EMPRUNT</u></h3>
<a href="interface_admine.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a>
<table class="table table-bordered ">
    <thead>
        <tr>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_emprunt as $emprunt_item) : ?>
            <tr>
                <th>
                    <?php 
                    // Recherche du nom de l'étudiant à partir de son IDE
                    foreach ($liste_etudiants as $etudiant) {
                        if ($etudiant["IDE"] == $emprunt_item["IDE"]) {
                          ?><h4 class="text-info"><u><?php echo $etudiant["NOME"] ;?></u></h4><?php  echo " a emprunté le livre ";      // Recherche du nom du livre à partir de son IDL
                            foreach ($liste_livres as $livre) {
                                if ($livre["IDL"] == $emprunt_item["IDL"]) {
    ?><p class="text-info"><u><?php  echo $livre["TITRE"];?></u></p><?php
                                    break;
                                }
                            }
                            echo " LE ";
echo date_format(date_create($emprunt_item["DATE_EMPRUNT"]), 'd-m-Y');
echo " à ";
echo date_format(date_create($emprunt_item["HEURE_EMPRUNT"]), 'H:i:s');

                            break;
                        }
                    }
                    ?>
                </th>
                <td>
                    <?php 
               
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
