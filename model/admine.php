<?php 
require_once("../controller/connexionbase.php");
class Admine{
    private $ida;
    private $prenoma;
    private $agea;
    private $pseudoa;
    private $mdpa;
    private $photoa;
    private $nomad;
      //constructeur
    public function __construct(){
        $this->ida=0;    
        $this->prenoma="";
        $this->agea=0;
        $this->pseudoe="";
        $this->mdpa=null;     
        $this->photoa=null;
        $this->nomad="";
        $this->connex=Connexion::getConnexion();
    }

        //geteur
        public function getIda(){
            return $this->ida;
        }
        
        public function getPrenoma(){
            return $this->prenoma;
        }
        public function getAgea(){
            return $this->agea;
        }
        public function getPseudoa(){
            return $this->pseudoa;
        }
        public function getMdpa(){
            return $this->mdpa;
    
        }       
        public function getPhotoa(){
            return $this->photoa;
        }
        public function getNomad(){
            return $this->nomad;
        }
         //seteur
    public function setIda($e_ida){
        $this->ida=$e_ida;
    }
   
    public function setPrenoma($e_prenoma){
        $this->prenoma=$e_prenoma;
    }
    public function setAgea($e_agea){
        $this->agea=$e_agea;
    }
    public function setPseudoa($e_pseudoa){
        $this->pseudoa=$e_pseudoa;
    }
    public function setMdpa($e_mdpa){
        $this->mdpa=$e_mdpa;
    }
   
    public function setPhotoa($e_photoa){
        $this->photoa=$e_photoa;
    }
    
    public function setNomad($e_nomad){
        $this->nomad=$e_nomad;
    }

      //create
    
      public function create() {
        $requete = "INSERT INTO Admine VALUES(null,  :prenoma, :agea, :pseudoa, :mdpa,  :photoa, :nomad)";
        $etat = $this->connex->prepare($requete);
        $etat->execute(array(
                   
            "prenoma" => $this->getPrenoma(),
            "agea" => $this->getAgea(),
            "pseudoa" => $this->getPseudoa(),
            "mdpa" =>$this->getMdpa(),
            "photoa" => $this->getPhotoa(),
            "nomad" =>$this->getNomad(),
           
        ));
        $etat->closeCursor();
    }
    //read
    public function read() {
        $requete = "SELECT * FROM Admine";
        $etat = $this->connex->prepare($requete);
        $etat->execute();
        $resultat = $etat->fetchAll();
        $etat->closeCursor();
        return $resultat;
    }
      //read by mdpe
      public function read_by_mdpa($mdpa){
        $requete = "SELECT * FROM Admine WHERE mdpa=:mdpa";
        $etat = $this->connex->prepare($requete);
        $etat->execute(array(
            "mdpa" =>$mdpa
        ));
        $resultat = $etat->fetchAll();
        $etat->closeCursor();
        return $resultat;
    }
    //update 
    public function update() {
        $requete = "UPDATE Admine  SET prenoma=:prenoma, agea=:agea, pseudoa=:pseudoa, mdpa=:mdpa, photoa=:photoa, nomad=:nomad  WHERE ida=:ida";
        $etat = $this->connex->prepare($requete);
        $etat->execute(array(
                     
            "prenoma" => $this->getPrenoma(),
            "agea" => $this->getAgea(),
            "pseudoe"=>$this->getPseudoa(),
            "mdpa" =>$this->getMdpa(),
            "photoa"=>$this->getPhotoa(),
            "nomad" =>$this->getNomad()
        ));
        $etat->closeCursor();

}
// admine info 
public function get_admine_info($ida) {
    $sql = "SELECT * FROM Admine WHERE ida = :ida";
    $stmt = $this->connex->prepare($sql);
    $stmt->bindParam(":ida", $ida, PDO::PARAM_INT);
    $stmt->execute();   
    $admine = $stmt->fetch(PDO::FETCH_ASSOC);
    return $admine;
}

}

?>