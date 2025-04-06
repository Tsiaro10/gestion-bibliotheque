<?php
session_start();
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
  exit; 
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["retour"])) {
    
         // Récupération des données du livre
         $livre_id = $_POST["livre_id"];
         $livre_titre = $_POST["livre_titre"];
         $livre_auteur = $_POST["livre_auteur"];
         $livre_annee = $_POST["livre_annee"];
         $livre_isbn = $_POST["livre_isbn"];
         $livre_quantite = $_POST["livre_quantite"];

         $livre_quantite = $_POST["livre_quantite"];
         $livre_quantite++;

         require_once("../model/livre.php");
$livre = new Livres(); 
$livre->updateQuantiteDisponible($livre_id, $livre_quantite);
$etudiant_id = $_POST["etudiant_id"];
  
        require_once("../model/emprunter.php");
        $emprunt = new Emprunter();
        $emprunt->deleteEmprunt($livre_id, $etudiant_id); 
        header ("location: ../view/liste_livre_emprunter.php");
        
       
        exit();
    }?> 


