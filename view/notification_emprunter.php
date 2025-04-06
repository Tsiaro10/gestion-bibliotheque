<?php 
$title="notification";
require_once("header2.php");
require_once("../model/emprunter.php");
require_once("../model/etudiant.php");
require_once("../model/livre.php");
require_once("../model/reserver.php");
session_start();

// comparaison  date et heure
function comparerEmprunts($a, $b) {
    $dateA = strtotime($a["DATE_EMPRUNT"] . ' ' . $a["HEURE_EMPRUNT"]);
    $dateB = strtotime($b["DATE_EMPRUNT"] . ' ' . $b["HEURE_EMPRUNT"]);
    if ($dateA == $dateB) {
        return 0;
    }
    return ($dateA > $dateB) ? -1 : 1;
}

// emprunts
$emprunt = new Emprunter();
$liste_emprunt = $emprunt->read();

//reservation
$reserve= new  Reserver();
$liste_reserve=$reserve->read();

//  comparaison
usort($liste_emprunt, "comparerEmprunts");

// étudiants
$etudiant = new Etudiant();
$liste_etudiants = $etudiant->read();

//  livres
$livre = new Livres();
$liste_livres = $livre->read();
?>

  <link rel="stylesheet" href="css/notif.css">  
<div class=" col-lg-12 container-fluid "><br><br><br>

    <!---------============== notification pour emprunt ===========------->

<div class="col-lg-6 jumbotron  notifemprunt">
<h3 class="text-center text-danger"><u>RAPPORT EMPRUNT</u></h3>
<a href="interface_admine.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a>
<table class="table table-bordered ">
    <thead>
        <tr>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_emprunt as $emprunt_item) : ?>
            <tr><th>
                
                    <?php 
                    // Recherche du nom de l'étudiant à partir de son IDE
                    foreach ($liste_etudiants as $etudiant) {
                        if ($etudiant["IDE"] == $emprunt_item["IDE"]) {
                          ?><h4 class="text-success"><u><?php echo $etudiant["NOME"] ;?></u></h4><?php  echo " a emprunté le livre ";      // Recherche du nom du livre à partir de son IDL
                            foreach ($liste_livres as $livre) {
                                if ($livre["IDL"] == $emprunt_item["IDL"]) {
    ?><p class="text-success"><u><?php  echo $livre["TITRE"];?></u></p><?php
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
               
                    <?php 
               
                    ?>
               
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<!---------============= notification pour reservation ==============--->

    <div class="col-lg-6 jumbotron notifreserve">
<h3 class="text-center text-danger"><u>RAPPORT RESERVATION</u></h3>
<a href="interface_admine.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a>
<table class="table table-bordered ">
    <thead>
        <tr>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_reserve as $reserve) : ?>
            <tr>
                <th>
                    <?php 
                    // Recherche du nom de l'étudiant à partir de son IDE
                    foreach ($liste_etudiants as $etudiant) {
                        if ($etudiant["IDE"] == $reserve["IDE"]) {
                          ?><h4 class="text-danger"><u><?php echo $etudiant["NOME"] ;?></u></h4><?php  echo " a reserve le livre ";      // Recherche du nom du livre à partir de son IDL
                            foreach ($liste_livres as $livre) {
                                if ($livre["IDL"] == $reserve["IDL"]) {
    ?><p class="text-danger"><u><?php  echo $livre["TITRE"];?></u></p><?php
                                    break;
                                }
                            }
                            echo "  POUR LE DATE DE  ";
echo date_format(date_create($reserve["DATE_RESERVE"]), 'd-m-Y');


                            break;
                        }
                    }
                    ?>
                </th>
                <th>
                    <br>
                    <form action="../controller/supprimer.php" method="POST">
                    
           <!--  un champ caché  -->
           <input type="hidden" name="livre_id" value="<?php echo $livre["IDL"]; ?>"> 
           <input type="hidden" name="etudiant_id" value="<?php echo $etudiant["IDE"]; ?>">               
          
                    <button class="btn-danger" name="supprimer">supprimer</button>
                
                </th>
                </form>
                <td>
                    <?php 
               
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div></div>
</div>