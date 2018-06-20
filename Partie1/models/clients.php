<?php
/* On crée une class client qui hérite de database
 * La méthode magique __construct nous permet de nous connecter à la base de donnée en appelant 
 * la méthode magique __construct du parent
 */
class clients extends database {
    // Création des attributs qui corresponde à chacun des champs de la table clients
    // On les initialise par rapport a leurs type
    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $birthDate = '01/01/2000';
    public $card = false;
    public $cardNumber = 0;
   
    public function __construct() {
        // On appelle le construct du parent
        parent::__construct();
    }
    /* On crée une méthode pour afficher la listes des clients
     */
    public function getClientsList(){
        // On mets notre requète dans la variable query
        $query = 'SELECT `id`, `lastName`, `firstName`, `birthDate`, `card`, `cardNumber` FROM `clients`';
        // On crée une variable $result qui exécute la requète $query avec la méthode query
        $result = $this->db->query($query);
        /* On crée la variable $resultList qui va nous permettre de retourner le resultat 
         * La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet
         */
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    } 
    
    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();       
    }
}
