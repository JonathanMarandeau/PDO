<?php
// On crée une class database
class database {
    // On crée un attribut $db qui sera disponible dans ses enfants car on la mis en public
    public $db;
    // On crée la méthode magique __construct pour se connecter à la base de donnée mySQL
    public function __construct() {
        // On essaye de se connecter en instanciant un nouvelle objet PDO 
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'Mettre_Mot_De_Passe');
            // On "attrape" l'exception et on arrête le script PHP
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage()); // Message d'erreur
        }
    }
    // Création de la méthode magique destruct qui nous permet de nous déconnecter de la base de donnée
    public function __destruct() {
        $this->db = NULL;
    }

}
