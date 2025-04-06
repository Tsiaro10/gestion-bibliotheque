<?php 
require_once("../model/etudiant.php");


if(isset($_POST["ajoutet"])) {

    if(!empty($_POST["nome"]) && !empty($_POST["prenome"]) && !empty($_POST["agee"]) && !empty($_POST["niveaue"]) && !empty($_POST["adressee"]) && !empty($_POST["nume"]) && !empty($_POST["mdpe"]) && !empty($_POST["pseudoe"])) {
        //
        if($_POST["mdpe"] == $_POST["confirm_mdpe"]) {
          
            $eleve = new Etudiant();
            
            $eleve->setIda($_POST["ida"]);
            $eleve->setNome($_POST["nome"]);
            $eleve->setPrenome($_POST["prenome"]);
            $eleve->setAgee($_POST["agee"]);
            $eleve->setNiveaue($_POST["niveaue"]);
            $eleve->setAdressee($_POST["adressee"]);
            $eleve->setNume($_POST["nume"]);
            $eleve->setMdpe($_POST["mdpe"]);
            $eleve->setPseudoe($_POST["pseudoe"]);
            $eleve->setPhotoe($_POST["photoe"]);
          
            $eleve->create();
           
            header("location: ../view/etudiantvue.php");
            exit;
        } else {
           
            echo "Veuillez vérifier le mot de passe.";
            exit;
        }
    } else {
        
        echo "Tous les champs sont obligatoires.";
        exit;
    }
} else {
  
    echo "Le formulaire n'a pas été soumis.";
}
?>
