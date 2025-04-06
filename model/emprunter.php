<?php 
require_once("../controller/connexionbase.php");

class Emprunter{
    private $idl;
    private $ide;
    private $date_emprunt;
    private $heure_emprunt;
    private $date_retour;
    private $connex;

    // Constructeur
    public function __construct(){
        $this->idl = 0;    
        $this->ide = 0;
        $this->date_emprunt = null;
        $this->heure_emprunt = null;
        $this->date_retour = null;     
        $this->connex = Connexion::getConnexion();
    }

    // Getters
    public function getIdl(){
        return $this->idl;
    }
    
    public function getIde(){
        return $this->ide;
    }
    
    public function getDate_emprunt(){
        return $this->date_emprunt;
    }
    
    public function getHeure_emprunt(){
        return $this->heure_emprunt;
    }
    
    public function getDate_retour(){
        return $this->date_retour;
    }       

    // Setters
    public function setIdl($e_idl){
        $this->idl = $e_idl;
    }
   
    public function setIde($e_ide){
        $this->ide = $e_ide;
    }
    
    public function setDate_emprunt($e_date_emprunt){
        $this->date_emprunt = $e_date_emprunt;
    }
    
    public function setHeure_emprunt($e_heure_emprunt){
        $this->heure_emprunt = $e_heure_emprunt;
    }
    
    public function setDate_retour($e_date_retour){
        $this->date_retour = $e_date_retour;
    }

    //  créer un emprunt
    public function create() {
        $requete = "INSERT INTO Emprunter VALUES(:idl, :ide, :date_emprunt, :heure_emprunt, :date_retour)";
        $etat = $this->connex->prepare($requete);
        $etat->execute(array(
            "idl" => $this->getIdl(),
            "ide" => $this->getIde(),
            "date_emprunt" => $this->getDate_emprunt(),
            "heure_emprunt" => $this->getHeure_emprunt(),
            "date_retour" => $this->getDate_retour(),         
        ));
        $etat->closeCursor();
    }

    //  lire tous les emprunts
    public function read() {
        $requete = "SELECT * FROM Emprunter";
        $etat = $this->connex->prepare($requete);
        $etat->execute();
        $resultat = $etat->fetchAll();
        $etat->closeCursor();
        return $resultat;
    }

    //  mettre à jour un emprunt
    public function update() {
        $requete = "UPDATE Emprunter SET idl=:idl, ide=:ide, date_emprunt=:date_emprunt, heure_emprunt=:heure_emprunt, date_retour=:date_retour WHERE ?";
        $etat = $this->connex->prepare($requete);
        $etat->execute(array(
            "idl" => $this->getIdl(),
            "ide" => $this->getIde(),
            "date_emprunt" => $this->getDate_emprunt(),
            "heure_emprunt" => $this->getHeure_emprunt(),
            "date_retour" => $this->getDate_retour(),  
        ));
        $etat->closeCursor();
    }

    // supprimer un emprunt
    public function delete() {
        $requete = "DELETE FROM Emprunter WHERE idl=?";
        $etat = $this->connex->prepare($requete);
        $etat->execute(array($this->getIdl())); 
        $etat->closeCursor();
    }

    //  un livre est déjà emprunté
    public function checkLivreEmprunte($livre_id) {
        $requeteEmprunts = "SELECT COUNT(*) AS count_emprunts FROM Emprunter WHERE idl = :livre_id";
        $etatEmprunts = $this->connex->prepare($requeteEmprunts);
        $etatEmprunts->execute(array(
            "livre_id" => $livre_id
        ));
        $resultatEmprunts = $etatEmprunts->fetch();
        $etatEmprunts->closeCursor();
        
        $requeteQuantite = "SELECT quantitel FROM Livres WHERE IDL = :livre_id";
        $etatQuantite = $this->connex->prepare($requeteQuantite);
        $etatQuantite->execute(array(
            "livre_id" => $livre_id
        ));
        $quantiteDisponible = $etatQuantite->fetchColumn();
        $etatQuantite->closeCursor();
        return ($resultatEmprunts['count_emprunts'] > 0 || $quantiteDisponible <= 0);
    }
//emprunt by etudiant
    public function getEmpruntsByEtudiant($etudiant_id) {
        $query = "SELECT * FROM Emprunter WHERE IDE = :etudiant_id";
        $statement = $this->connex->prepare($query);
        $statement->bindParam(':etudiant_id', $etudiant_id, PDO::PARAM_INT);
        $statement->execute();
    
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;
    }
//voir livre emprunter
    public function checkLivreEmprunteByEtudiant($livre_id, $ide) {
        $sql = "SELECT * FROM emprunter WHERE idl = :idl AND ide = :ide";
        $stmt = $this->connex->prepare($sql);
        $stmt->execute(array(":idl" => $livre_id, ":ide" => $ide));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false; 
    }
    
    // delete
    public function deleteEmprunt($livre_id, $etudiant_id) {
        $requete = "DELETE FROM Emprunter WHERE IDL = :livre_id AND IDE = :etudiant_id";
        $statement = $this->connex->prepare($requete);
        $statement->bindParam(':livre_id', $livre_id, PDO::PARAM_INT);
        $statement->bindParam(':etudiant_id', $etudiant_id, PDO::PARAM_INT);
        $statement->execute();
    }
    
}
?>
