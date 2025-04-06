<?php
require_once("../model/emprunter.php");
require_once("../model/livre.php");
require_once("../model/etudiant.php");
session_start();
if (!isset($_SESSION["ide"])) {
    header("Location: inscription.php");
    exit;
}

if (isset($_POST["emprunt"])) {

    if (isset($_POST["livre_id"]) && isset($_POST["livre_titre"]) && isset($_POST["livre_auteur"]) && isset($_POST["livre_annee"]) && isset($_POST["livre_isbn"]) && isset($_POST["livre_quantite"])) {
        
        $livre_id = $_POST["livre_id"];
        $livre_titre = $_POST["livre_titre"];
        $livre_auteur = $_POST["livre_auteur"];
        $livre_annee = $_POST["livre_annee"];
        $livre_isbn = $_POST["livre_isbn"];
        $livre_quantite = $_POST["livre_quantite"];
        $date = date("Y-m-d");
        $heure = date("H:i:s");
        $ide = $_SESSION["ide"];
        $date_retour = date("Y-m-d");

    
        if ($livre_quantite <= 0) {
            $_SESSION["message"] = "Le livre $livre_titre n'est pas disponible car sa quantité est épuisée.";
            echo $_SESSION["message"];
            exit;
        }
        
        $emprunt = new Emprunter();
        $livre_deja_emprunte = $emprunt->checkLivreEmprunteByEtudiant($livre_id, $_SESSION["ide"]);
        if ($livre_deja_emprunte) {
            
            echo "Vous avez deja emprunter ce livre.";
            echo $livre_titre;
            exit;
        }

        $livre_quantite--;
        $livre = new Livres();
        $livre->updateQuantiteDisponible($livre_id, $livre_quantite);

        $admine = new Emprunter();
        $admine->setIdl($livre_id);
        $admine->setIde($ide);
        $admine->setDate_emprunt($date);
        $admine->setHeure_emprunt($heure);
        $admine->setDate_retour($date_retour); 
        $admine->create();

        header("location: ../view/liste_livre_disponible.php");
        exit;

    } 
    else {
       
        header("Location: page_principale.php");
        exit;
    }
    
} elseif (isset($_POST["reserver"])) {
    $livre_id = $_POST["livre_id"];
    echo $livre_id;
    exit;
}
?>
