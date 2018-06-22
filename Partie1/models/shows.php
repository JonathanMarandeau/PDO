<?php

class shows extends database {
    
    public function __construct() {
        // On appelle le construct du parent
        parent::__construct();
    }
    
    /* On crée une méthode pour afficher la listes des clients possédant la carte fidélité
     */
    public function getTitleShow(){
        /* On mets notre requète dans la variable query
         * Je veux le titre du spectacle, son interprète, la date et l'heure du spectacle
         * Trié pas ordre alphabétique en fonction du titre du spectTIME_FORMAT(`startTime`, "%H:%i") AS `startTime`TIME_FORMAT(`startTime`, "%H:%i") AS `startTime`acle
         * TIME_FORMAT(`startTime`, "%H:%i") AS `startTime`: Formatage de l'heure comme on le souhaite 
         */
        $query = 'SELECT `title`, `performer`, DATE_FORMAT(`date`,"%d/%m/%Y") AS `date`, TIME_FORMAT(`startTime`, "%H:%i") AS `startTime` FROM `shows` ORDER BY `title`';
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
