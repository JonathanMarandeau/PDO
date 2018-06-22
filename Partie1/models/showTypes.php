<?php


class showTypes extends database {
    public function __construct() {
        // On appelle le construct du parent
        parent::__construct();
    }
     public function showTypesList(){
        // On mets notre requète dans la variable query
        $query = 'SELECT `id`, `type` FROM `showTypes`';
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
