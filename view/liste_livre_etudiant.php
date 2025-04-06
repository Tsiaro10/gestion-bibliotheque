<?php
session_start();
if(!isset($_SESSION["ide"])) {
    header("Location: inscription.php");
    exit; // Assure que le script s'arrête après la redirection
}

require_once("../model/livre.php");

$livre = new Livres();
$listeLivres = $livre->read();
$title = "Page | Livres";
require_once("../view/header.php");
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<div class="container">
    <br>
    <h1 class="text-center text-danger">TOUS LES LIVRES</h1><hr><br>
   
    <a href="interface_etudiant.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i> Retour</a><br>
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
</div><br>

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
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeLivres as $livre) : ?>
                    <tr>
                    <td><img src="img/<?php echo $livre["IMAGEL"]; ?>" alt="" class="img-responsive img-circle"></td>
                        <td><?php echo $livre["TITRE"]; ?></td>
                        <td><?php echo $livre["AUTEUR"]; ?></td>
                        <td><?php echo $livre["ANNEE"]; ?></td>
                        <td><?php echo $livre["ISBN"]; ?></td>
                        <td><?php echo $livre["QUANTITEL"]; ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
