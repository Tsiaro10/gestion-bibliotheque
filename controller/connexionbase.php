<?php
    class Connexion {
        private static $c;
        public function __construct() {}
        public static function getConnexion() {
            try {
                 $hote = "mysql:host=127.0.0.1;dbname=biblio2";
                $utilisateur = "root";
                $mdp = "";
                     self::$c = new PDO($hote, $utilisateur, $mdp);
            } catch(PDOException $e) {
                echo "Tsy mandeha";
            }
            return self::$c;
        }
    }
?>