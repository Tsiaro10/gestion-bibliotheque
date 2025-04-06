<?php 
require_once ("../model/admine.php");
//verification bouton fonction 
if(isset($_POST["ajoutet"])) {
        if(!empty($_POST["prenoma"]) and !empty($_POST["agea"])and !empty($_POST["mdpa"])and !empty($_POST["pseudoa"]) and !empty($_POST["nomad"])){

               extract($_POST);
        $admine = new Admine();
        $admine->setPrenoma($prenoma);
        $admine->setAgea($agea);
        $admine->setMdpa($mdpa);
        $admine->setPseudoa($pseudoa);
        $admine->setPhotoa($photoa);
        $admine->setNomad($nomad);
        $admine->create();
        header("location: ../view/ajoutadmin.php");
            exit;
        }
        echo "tsy  mandeha";
}
?>