<?php 
require_once("../controller/connexionbase.php");

class Reserver {
    private $idl;
    private $ide;
    private $date_reserve;
    private $heure_reserve;
    private $retour;
    private $connex;

    // Construction
    public function __construct(){
        $this->idl = 0;
        $this->ide = 0;
        $this->date_reserve = null;
        $this->heure_reserve = null;
        $this->retour = null;
        $this->connex = Connexion::getConnexion(); 
    }

    public function getIdl(){
        return $this->idl;
    }

    public function setIdl($idl){
        $this->idl = $idl;
    }

    public function getIde(){
        return $this->ide;
    }

    public function setIde($ide){
        $this->ide = $ide;
    }
    public function getDate_reserve(){
        return $this->date_reserve;
    }

    public function setDate_reserve($date_reserve){
        $this->date_reserve = $date_reserve;
    }

    public function getHeure_reserve(){
        return $this->heure_reserve;
    }

    public function setHeure_reserve($heure_reserve){
        $this->heure_reserve = $heure_reserve;
    }
    public function getRetour(){
        return $this->retour;
    }

    public function setRetour($retour){
        $this->retour = $retour;
    }

    // Create
    public function create() {
        $requete = "INSERT INTO Reserver (idl, ide, date_reserve, heure_reserve, retour) VALUES (:idl, :ide, :date_reserve, :heure_reserve, :retour)";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array(
            "idl" => $this->getIdl(),
            "ide" => $this->getIde(),
            "date_reserve" => $this->getDate_reserve(),
            "heure_reserve" => $this->getHeure_reserve(),
            "retour" => $this->getRetour()
        ));
        $statement->closeCursor();
    }

    // Read 
    public function read() {
        $requete = "SELECT * FROM Reserver";
        $statement = $this->connex->prepare($requete);
        $statement->execute();
        $resultat = $statement->fetchAll();
        $statement->closeCursor();
        return $resultat;
    }

    // Read by id
    public function readById($id) {
        $requete = "SELECT * FROM Reserver WHERE idl = :idl";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array("idl" => $id));
        $resultat = $statement->fetch();
        $statement->closeCursor();
        return $resultat;
    }

    // Update
    public function update() {
        $requete = "UPDATE Reserver SET ide = :ide, date_reserve = :date_reserve, heure_reserve = :heure_reserve, retour = :retour WHERE idl = :idl";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array(
            "idl" => $this->getIdl(),
            "ide" => $this->getIde(),
            "date_reserve" => $this->getDate_reserve(),
            "heure_reserve" => $this->getHeure_reserve(),
            "retour" => $this->getRetour()
        ));
        $statement->closeCursor();
    }

    // Delete
    public function delete($id) {
        $requete = "DELETE FROM Reserver WHERE idl = :idl";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array("idl" => $id));
        $statement->closeCursor();
    }
    // check livre si daja reserver
    public function checkLivreReserveByEtudiant($livre_id, $ide) {
        $sql = "SELECT * FROM Reserver WHERE idl = :idl AND ide = :ide";
        $stmt = $this->connex->prepare($sql);
        $stmt->execute(array(":idl" => $livre_id, ":ide" => $ide));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false;
    }
        //  les reservations
    public function getReserveByEtudiant($etudiant_id) {
            $query = "SELECT * FROM Reserver WHERE IDE = :etudiant_id";
            $statement = $this->connex->prepare($query);
            $statement->bindParam(':etudiant_id', $etudiant_id, PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        // delete
        public function deleteReservation($livre_id, $etudiant_id) {
            $requete = "DELETE FROM Reserver WHERE IDL = :livre_id AND IDE = :etudiant_id";
            $statement = $this->connex->prepare($requete);
            $statement->bindParam(':livre_id', $livre_id, PDO::PARAM_INT);
            $statement->bindParam(':etudiant_id', $etudiant_id, PDO::PARAM_INT);
            $statement->execute();
        }
}
?>
