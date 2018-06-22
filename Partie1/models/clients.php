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
    
     /* On crée une méthode pour afficher la listes des 20 premiers clients
     */
    public function getFirst20ClientsList(){
        // On mets notre requète dans la variable query
        // DATE_FORMAT(`birthDate`,"%d/%m/%Y") AS `birthDate`: fonction pour transformer le format de la date comme on le souhaite
        // FLOOR(DATEDIFF(NOW(),`birthDate`)/365) AS `age`: Fonction pour transformer en age l'ecart entre deux dates 
        $query = 'SELECT `id`, `lastName`, `firstName`, DATE_FORMAT(`birthDate`,"%d/%m/%Y") AS `birthDate`,FLOOR(DATEDIFF(NOW(),`birthDate`)/365) AS `age`, `card`, `cardNumber` FROM `clients` LIMIT 20';
        // On crée une variable $result qui exécute la requète $query avec la méthode query
        $result = $this->db->query($query);
        /* On crée la variable $resultList qui va nous permettre de retourner le resultat 
         * La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet
         */
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    } 
    
    /* On crée une méthode pour afficher la listes des clients possédant la carte fidélité
     */
    public function getOwnCardClientsList(){
        /* On mets notre requète dans la variable query
         * Je veux le nom, prenom, carte et numéro de carte depuis clients
         * Mais je ne souhaite afficher que les clients qui ont la carte avec WHERE 
         */
        $query = 'SELECT `lastName`, `firstName`, `card`, `cardNumber` FROM `clients` WHERE `card` = true';
        // On crée une variable $result qui exécute la requète $query avec la méthode query
        $result = $this->db->query($query);
        /* On crée la variable $resultList qui va nous permettre de retourner le resultat 
         * La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet
         */
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    } 
    
    
    /**
     * On crée une méthode pour afficher la listes des clients commençant par M
     * @return array
     */
    public function getStartMClients(){
        /* On mets notre requète dans la variable query
         * Je veux les nom et prénoms des clients
         * Seulement les clients où leur nom commence par M et trié par ordre alphabétique
         * Bien penser a échappé pour le cote du LIKE
         */
        $query = 'SELECT `lastName`, `firstName` FROM `clients` WHERE `lastName` LIKE \'m%\' ORDER BY `lastName`';
        // On crée une variable $result qui exécute la requète $query avec la méthode query
        $result = $this->db->query($query);
        /* On crée la variable $resultList qui va nous permettre de retourner le resultat 
         * La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet
         */
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }
    
    /**
     * On crée une méthode pour afficher la listes des clients commençant par M
     * @return array
     */
    public function getAllClients(){
        /* On mets notre requète dans la variable query
         * Je veux les nom et prénoms des clients    
         * CASE WHEN `card` = 1 THEN \'oui\' ELSE \'non\' END AS `card`: Transforme un boolean en oui ou non              
         */
        $query = 'SELECT `lastName`, `firstName`, DATE_FORMAT(`birthDate`,"%d/%m/%Y") AS `birthDate`, CASE WHEN `card` = 1 THEN \'oui\' ELSE \'non\' END AS `card`, `cardNumber` FROM `clients`';
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
