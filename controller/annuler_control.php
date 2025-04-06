<?php
session_start();
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
  exit; 
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["annuler"])) {
    
   
         // Récupération des données du livre
         $livre_id = $_POST["livre_id"];
         $livre_titre = $_POST["livre_titre"];
         $livre_auteur = $_POST["livre_auteur"];
         $livre_annee = $_POST["livre_annee"];
         $livre_isbn = $_POST["livre_isbn"];
         $livre_quantite = $_POST["livre_quantite"];

 
$etudiant_id = $_POST["etudiant_id"];
  
        require_once("../model/reserver.php");
        $reserve = new Reserver();
        $reserve->deleteReservation($livre_id, $etudiant_id); 
        header("location: ../view/livre_reserver.php");
       
        exit();
    }?> 


