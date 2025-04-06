<?php 
session_start();
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
}
require_once ("../model/emprunter.php");
require_once ("../model/livre.php");
require_once ("../model/etudiant.php");

if(isset($_POST["emprunter"])) {
    if(isset($_POST["idl"]) and isset($_POST["date_retour"])){
 $date = date("Y-m-d");
 $heure = date("H:i:s");
 $ide=$_SESSION["ide"];
    extract($_POST);

    
    $admine = new Emprunter();
    $admine->setIdl($idl);
    $admine->setIde($ide);
    $admine->setDate_emprunt($date);
    $admine->setHeure_emprunt($heure);
    $admine->setDate_retour($date_retour);
    $admine->create();
    
    header("location: ../view/empruntlist.php");
    exit;
} 
else {
    echo "Le formulaire n'a pas été soumis.";
}
} 
?>