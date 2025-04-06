<?php

require_once("../model/livre.php");
require_once ("../view/header2.php");

if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $livres = new Livres();
    $resultats = $livres->search($searchTerm);
    if ($resultats) {?>
       
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
            <?php foreach ($resultats as $livre) : ?>
                <tr>
                <td><img src="../view/img/<?php echo $livre["IMAGEL"]; ?>" alt="" class="img-responsive img-circle"></td>
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
</div><?php
        }
        echo "</table>";
    } else {
        echo "<p>Aucun résultat trouvé pour '$searchTerm'.</p>";
    }

?>
