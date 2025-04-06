<?php
session_start();
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
}
require_once("../model/livre.php");

$title="Page | Livres";
// Créer une instance de la classe Livres
$livre = new Livres();

// Récupérer la liste des livres disponibles
$listeLivresDisponibles = $livre->getLivresDisponibles();

// Inclure le fichier header
require_once("header.php");
?>

<!-- Titre -->
<div class="container">
    <br>
    <h1 class="text-center text-danger">TOUS LES LIVRES DISPONIBLES</h1>
    <hr><br>
    <a href="interface_etudiant.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i> Retour</a><br>
</div><br>

<!-- Affichage des livres -->
<div class="container">
    <div class="row jumbotron">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                  <th>Photo</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année</th>
                    <th>ISBN</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listeLivresDisponibles as $livre) { ?>
                    <tr>
                    <td><img src="img/<?php echo $livre["IMAGEL"]; ?>" alt=""></td>
                        <td><?php echo $livre["TITRE"]; ?></td>
                        <td><?php echo $livre["AUTEUR"]; ?></td>
                        <td><?php echo $livre["ANNEE"]; ?></td>
                        <td><?php echo $livre["ISBN"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addbook_<?php echo $livre['IDL']; ?>">RESERVER</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de réservation -->
<?php foreach($listeLivresDisponibles as $livre) { ?>
    <div class="modal fade" id="addbook_<?php echo $livre['IDL']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="../controller/control_reservation.php" method="POST">
                        <!-- Champs cachés pour les informations du livre -->
                        <input type="hidden" name="livre_id" value="<?php echo $livre["IDL"]; ?>">
                        <input type="hidden" name="livre_titre" value="<?php echo $livre["TITRE"]; ?>">
                        <input type="hidden" name="livre_auteur" value="<?php echo $livre["AUTEUR"]; ?>">
                        <input type="hidden" name="livre_annee" value="<?php echo $livre["ANNEE"]; ?>">
                        <input type="hidden" name="livre_isbn" value="<?php echo $livre["ISBN"]; ?>">
                        <input type="hidden" name="livre_quantite" value="<?php echo $livre["QUANTITEL"]; ?>">
                        <!-- Autres champs de réservation -->
                        <div class="form-group">
                            <label for="date_reserve">Date de réservation :</label>
                            <input type="date" class="form-control" id="date_reserve" name="date_reserve" required>
                        </div>
                        <div class="form-group">
                            <label for="heure_reserve">Heure de réservation :</label>
                            <input type="time" class="form-control" id="heure_reserve" name="heure_reserve" required>
                        </div>
                        <div class="form-group">
                            <label for="date_retour">Date de retour :</label>
                            <input type="date" class="form-control" id="date_retour" name="retour" required>
                        </div>
                        <!-- Bouton de réservation -->
                        <button type="submit" class="btn btn-primary" name="reserver">Réserver</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


