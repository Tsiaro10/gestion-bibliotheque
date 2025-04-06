<?php
session_start();
	require_once("../model/etudiant.php");
	if($_POST["bouton"] == "Se connecter") {
		if(isset($_POST["pseudoe"]) and isset($_POST["mdpe"])) {
			extract($_POST);
			$eleve = new Etudiant();
$liste_eleve = $eleve->read_by_mdpe($mdpe);
			$mot_de_passe = $liste_eleve[0]["MDPE"];
			if($mdpe==$mot_de_passe) {
				$_SESSION["ide"] = $liste_eleve[0]["IDE"];
				$_SESSION["membres_connecte"] = $liste_eleve[0]["PSEUDOE"];
				header("Location: ../view/interface_etudiant.php");
             exit;
			}
            else {
				//header("Location: ../view/inscription.php");
                echo "mot de passe incorrect ou identifiant";
				exit;
			}
		}
         else 
        {
			header("Location: ../view/inscription.php");
		}
    }
	// inscription
	if($_POST["bouton"] == "S'inscrire") {
		header("Location: ../view/fiche_inscription.php");
	}

	// compte admin
	require_once ("../model/admine.php");
	if($_POST["bouton"] == "connexion") {
		if(isset($_POST["pseudoa"]) and isset($_POST["mdpa"])) {
			extract($_POST);
			$admine = new Admine();
$liste_admine = $admine->read_by_mdpa($mdpa);
			$mot_de_passe = $liste_admine[0]["MDPA"];
			if($mdpa==$mot_de_passe) {
				$_SESSION["ida"] = $liste_admine[0]["IDA"];
				$_SESSION["admin_connecte"] = $liste_admine[0]["PSEUDOA"];
				$administrateur=$_SESSION["admin_connecte"];
				header("location: ../view/interface_admine.php");
				exit;
             
			}
            else {
				//header("Location: ../view/inscription.php");
                echo "diso";
			}
		}
         else 
        {
			header("Location: ../view/inscription.php");
		}
	}
?>