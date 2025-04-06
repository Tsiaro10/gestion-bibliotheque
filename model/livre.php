<?php 
require_once ("../controller/connexionbase.php");

require_once ("../controller/connexionbase.php");

class Livres {
    private $idl;
    private $ida;
    private $titre;
    private $auteur;
    private $annee;
    private $isbn;
    private $imagel;
    private $connex;
    private $resumel;
    private $quantitel;

    // construct
    public function __construct() {
        $this->idl = 0;
        $this->ida = 0;
        $this->titre = "";
        $this->auteur = "";
        $this->annee = 0;
        $this->isbn = 0;
        $this->imagel = null;
        $this->resumel = "";
        $this->quantitel = 0;
        $this->connex = Connexion::getConnexion();
    }

    /* Méthodes Getter */

    public function getIdl(){
        return $this->idl;
    }
    public function getIda(){
        return $this->ida;
    }
    public function getTitre(){
        return $this->titre;
    }

    public function getAuteur(){
        return $this->auteur;
    }

    public function getAnnee(){
        return $this->annee;
    }

    public function getIsbn(){
        return $this->isbn;
    }

    public function getImagel(){
        return $this->imagel;
    }
    public function getResumel(){
        return $this->resumel;
    }

    public function getQuantitel(){
        return $this->quantitel;
    }

    /* Méthodes Setter */

    public function setIdl($l_idl){
        $this->idl = $l_idl;
    }
    public function setIda($l_ida){
        $this->ida = $l_ida;
    }

    public function setTitre($l_titre){
        $this->titre = $l_titre;
    }

    public function setAuteur($l_auteur){
        $this->auteur = $l_auteur;
    }

    public function setAnnee($l_annee){
        $this->annee = $l_annee;
    }

    public function setIsbn($l_isbn){
        $this->isbn = $l_isbn;
    }

    public function setImagel($l_imagel){
        $this->imagel = $l_imagel;
    }

    public function setResumel($l_resumel){
        $this->resumel = $l_resumel;
    }

    public function setQuantitel($l_quantitel){
        $this->quantitel = $l_quantitel;
    }

    /* Méthode create */

    public function create() {
        $requete = "INSERT INTO Livres VALUES(null, :ida, :titre, :auteur, :annee, :isbn, :imagel, :resumel, :quantitel)";
        $etat = $this->connex->prepare($requete);
        $etat->execute(array(
            "ida" => $this->getIda(),
            "titre" => $this->getTitre(),          
            "auteur" => $this->getAuteur(),
            "annee" => $this->getAnnee(),
            "isbn" => $this->getIsbn(),
            "imagel" => $this->getImagel(),
            "resumel" => $this->getResumel(),
            "quantitel" => $this->getQuantitel(),
        ));
        $etat->closeCursor();
    }
    

    /* Méthode read */

    public function read() {
        $requete = "SELECT * FROM Livres";
        $etat = $this->connex->prepare($requete);
        $etat->execute();
        $resultat = $etat->fetchAll();
        $etat->closeCursor();
        return $resultat;
    }

    /* Méthode update */

    public function update() {
        $requete = "UPDATE Livres SET titre=:titre, auteur=:auteur, annee=:annee, isbn=:isbn, imagel=:imagel, resumel=:resumel, ida=:ida, quantitel=:quantitel WHERE idvl=:idvl";
        $etat = $this->connex->prepare($requete);
        $etat->execute(array(
            "titre" => $this->getTitre(),          
            "auteur" => $this->getAuteur(),
            "annee" => $this->getAnnee(),
            "isbn" => $this->getIsbn(),
            "imagel" =>$this->getImagel(),
            "resumel" =>$this->getResumel(),
            "ida" =>$this->getIda(),
            "quantitel" =>$this->getQuantitel(),
            "idvl" =>$this->getIdl(),
        ));
        $etat->closeCursor();
    }

    /* Méthode delete */

    public function delete() {
        $requete = "DELETE FROM Livres WHERE idl=?";
        $etat = $this->connex->prepare($requete);
        $etat->execute(array($this->getIdl())); // Passer seulement la valeur de l'ID
        $etat->closeCursor();
    }

   
  // Livres disponibles
public function getLivresDisponibles() {
    $requete = "SELECT * FROM Livres WHERE QUANTITEL > 0";
    $etat = $this->connex->prepare($requete);
    $etat->execute();
    $resultat = $etat->fetchAll();
    $etat->closeCursor();
    return $resultat;
}

// plus quantite
public function updateQuantiteDisponible($livre_id, $nouvelle_quantite) {
    $requete = "UPDATE Livres SET QUANTITEL = :nouvelle_quantite WHERE IDL = :livre_id";
    $etat = $this->connex->prepare($requete);
    $etat->execute(array(
        "nouvelle_quantite" => $nouvelle_quantite,
        "livre_id" => $livre_id
    ));
    $etat->closeCursor();
}

public function search($term) {
    $sql = "SELECT * FROM livres WHERE TITRE LIKE :searchTerm OR AUTEUR LIKE :searchTerm";
    
    $stmt = $this->connex->prepare($sql);
    $stmt->bindValue(':searchTerm', "%$term%", PDO::PARAM_STR);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>
