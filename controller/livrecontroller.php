<?php 
require_once ("../model/livre.php");


if(isset($_POST["bouton"])) {
    
    if( !empty($_POST["ida"]) and !empty($_POST["titre"]) and !empty($_POST["auteur"]) and !empty($_POST["annee"]) and !empty($_POST["isbn"]) and !empty($_POST["imagel"]) and !empty($_POST["resumel"]) and !empty($_POST["quantitel"])) {
        extract($_POST);

        
        $livre = new Livres();
       
        $livre->setIdl($idl);
        $livre->setIda($ida);
        $livre->setTitre($titre);
        $livre->setAuteur($auteur);  
        $livre->setAnnee($annee); 
        $livre->setIsbn($isbn);
        $livre->setImagel($imagel);
        $livre->setResumel($resumel);
        $livre->setQuantitel($quantitel);
        $livre->create();

        // Redirection
        header("location: ../view/interface_admine.php");
        exit;
}
echo ("fenoy daholo ny formulaire");
}
?>
