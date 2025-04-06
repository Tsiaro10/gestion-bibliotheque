<?php
require_once("../model/etudiant.php");

if(isset($_GET['sup'])){
    $sup = $_GET['sup'];
    
    $eleve= new Etudiant();
    $eleve->setIde($sup);
    $eleve->delete();
  
    header("location: ../view/liste_etudiant.php");
    exit();
}
?>
