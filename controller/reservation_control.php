<?php 
require_once ("../model/reserver.php");

if(isset($_POST["reserver"])) {
   
  if(isset($_POST["idl"]) and isset($_POST["ide"]) and isset($_POST["date_reserve"]) and isset($_POST["heure_reserve"]) and isset($_POST["retour"])){
     echo "mandeha";
    extract($_POST);

    $reserver = new Reserver();
    $reserver->setIdl($idl);
    $reserver->setIde($ide);
    $reserver->setDate_reserve($date_reserve);
    $reserver->setHeure_reserve($heure_reserve);
    $reserver->setRetour($retour);
    $reserver->create();

   exit;
} /*
else {
    echo "Le formulaire n'a pas été soumis.";
}
} */}
?>