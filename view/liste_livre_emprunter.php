<?php 
$title="Emprunter";
require_once("header2.php");
require_once("../model/emprunter.php");
require_once("../model/etudiant.php");
require_once("../model/livre.php");
session_start();
if(!isset($_SESSION["ide"])) {
    header("Location: inscription.php");
    exit; 
}

$etudiant_id = $_SESSION['ide']; 

//  emprunter
$emprunt = new Emprunter();
$liste_emprunt = $emprunt->getEmpruntsByEtudiant($etudiant_id);

//  livres
$livre = new Livres();
$liste_livres = $livre->read(); 

?>

<div class="container jumbotron">
<h2 class="text-center text-danger"><u>LIVRES DÉJÀ EMPRUNTÉS</u></h2>
<a href="interface_etudiant.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i> Retour</a><br><br>
<table class="table table-bordered ">
    <thead>
        <tr> 
            <th>Titre</th>
            <th>Date d'emprunt</th>
            <th>Auteur</th>
            <th>ISBN</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_emprunt as $emprunt_item) : ?>
            <tr>
               
                <td>
                    <?php 

                    //  nom du livre 

                    foreach ($liste_livres as $livre) {
                        if ($livre["IDL"] == $emprunt_item["IDL"]) {
                            echo $livre["TITRE"];
                            break;
                        }
                    }
                    ?>
                </td>
                <td><?php echo $emprunt_item["DATE_EMPRUNT"]; ?></td>
                <td><?php echo $livre["AUTEUR"]; ?></td>
                <td><?php echo $livre["ISBN"]; ?></td>
                <td>

                    <!--  bouton de retour -->
                    <form action="../controller/retourcontrol.php" method="POST">
                    <input type="hidden" name="livre_titre" value="<?php echo $livre["TITRE"]; ?>">
                                <input type="hidden" name="livre_auteur" value="<?php echo $livre["AUTEUR"]; ?>">
                                <input type="hidden" name="livre_annee" value="<?php echo $livre["ANNEE"]; ?>">
                                <input type="hidden" name="livre_isbn" value="<?php echo $livre["ISBN"]; ?>">
                                <input type="hidden" name="livre_quantite" value="<?php echo $livre["QUANTITEL"]; ?>">

                        <!-- Champ caché  -->
                        
                        <input type="hidden" name="livre_id" value="<?php echo $emprunt_item["IDL"]; ?>">   
                        <input type="hidden" name="etudiant_id" value="<?php echo $emprunt_item["IDE"]; ?>">

                        <!-- Bouton de retour -->
                        <button type="submit" class="btn btn-danger" name="retour">Retour</button>
                        
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
