<?php 
require_once ("../model/emprunter.php");
require_once ("../model/livre.php");
require_once ("../model/etudiant.php");
require_once("../model/reserver.php");

session_start();
if (!isset($_SESSION["ide"])) {
    header("Location: inscription.php");
    exit;
}

if(isset($_POST["reserver"])){
    
    $livre_id = $_POST["livre_id"];
    $ide = $_SESSION["ide"];
    $date_reserve = $_POST["date_reserve"];
    $heure_reserve = $_POST["heure_reserve"];
    $retour = $_POST["retour"];

    $reserve= new Reserver();
    $livre_deja_reserver = $reserve->checkLivreReserveByEtudiant($livre_id, $_SESSION["ide"]);
    if ($livre_deja_reserver) {
    
        echo "Vous avez deja reserver  ce livre.";
        exit;
    }

    
    $reserver = new Reserver();
    
    
    $reserver->setIdl($livre_id);
    $reserver->setIde($ide);
    $reserver->setDate_reserve($date_reserve);
    $reserver->setHeure_reserve($heure_reserve);
    $reserver->setRetour($retour);
    $reserver->create();

    header("Location: ../view/reservation.php");
    exit;

}
 else {
    echo "Erreur : il y a une probleme";
    exit;
}
?>
