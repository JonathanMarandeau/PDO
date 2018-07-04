<?php

class appointments extends database {
    
    public $id = 0;
    public $dateHour = '01/01/1900';
    public $idPatients = 0;
    
    public function __construct() {
        // On appelle le construct du parent
        parent::__construct();
    }
    // EXO 5
    // Ajouter un rendez-vous
    public function addAppointment(){
        // Insertion des données du rendez-vous à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex: :id).
        $query = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients)';
        // Je mets ma requète dans une variable
        $addAppointment = $this->db->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $addAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $addAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        // on utilise la méthode execute() via un return
        return $addAppointment->execute();
        
    }
    // Méthode qui vérifie si un rdv existe par rapport a un patient
    public function checkFreeAppointment(){
        // On effectue une requète qui compte le nombre de ligne qui correspond a dateHour et idPatients
        // Un dateHour avec un idPatients (un patient ne peu aps avoir deux rdv à la meme heure)
        $query = 'SELECT COUNT(*) AS `takenAppointment` FROM `appointments` WHERE `dateHour` = :dateHour AND `idPatients` = :idPatients';
        // On mets la requète dans une variable
        $checkFreeAppointment = $this->db->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $checkFreeAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $checkFreeAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        if ($checkFreeAppointment->execute()){
            $appointmentMatch = $checkFreeAppointment->fetch(PDO::FETCH_OBJ);
        } else {
            $appointmentMatch = false;
        }
        return $appointmentMatch;
    }
    
    // EXO 6
    // Afficher la liste des rendez-vous
    public function showListAppointments() {
        // Je créé une requète que je place dans une variable query
        // Je souhaite sélectionner toutes les données présentes dans la table appointments
        // Les date format premettent d'afficher la date et l'heure dans le format que je souhaite
        $query = 'SELECT DATE_FORMAT(`appointments`.`dateHour`, "%d/%m/%Y") AS `date`,
                                   DATE_FORMAT(`appointments`.`dateHour`, "%H:%i") AS `hour`,
                                   `appointments`.`id`,
                                   `patients`.`lastname`,
                                   `patients`.`firstname`
                            FROM `appointments`
                            LEFT JOIN `patients`
                            ON `appointments`.`idPatients` = `patients`.`id`
                            ORDER BY `appointments`.`dateHour`';
        // Je crée une variable $showAllAppointments qui exécute la requète $query avec la méthode query
        $showAllAppointments = $this->db->query($query);
        /* On crée la variable $resultQueryAppointments qui va nous permettre de retourner le resultat 
         * La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet
         */
        $resultQueryAppointments = $showAllAppointments->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultQueryAppointments;
        
    }
    
    // DETAILS RDV (EXO 7)
    public function getAllDetailsAppointments(){
        $isCorrect = false;
        /*
         * Je souhaite récupérer toutes les informations concernant les patients présente dans la table patients
         */
        // Je remodifie le format de la date en type americain pour le récupérer en affichage de type date
        $query = 'SELECT DATE_FORMAT(`appointments`.`dateHour`, "%Y-%m-%d") AS `date`, 
                         DATE_FORMAT(`appointments`.`dateHour`, "%H:%i") AS `hour`,
                         `appointments`.`id`,
                         `patients`.`lastname`,
                         `patients`.`firstname`,
                         `appointments`.`idPatients`
                  FROM `appointments`
                  LEFT JOIN `patients`
                  ON `appointments`.`idPatients` = `patients`.`id`
                  WHERE `appointments`.`id` = :idAppointment';
        // On crée une variable $allDetailsAppointments qui exécute la requète $query avec la méthode prepare
        $allDetailsAppointments = $this->db->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $allDetailsAppointments->bindValue(':idAppointment', $this->id, PDO::PARAM_INT);
        // on utilise la méthode execute() via un return
        if ($allDetailsAppointments->execute()){
            /* On crée la variable $resultDetailsAppointment qui va nous permettre de retourner le resultat 
             * La fonction fetch permet d'afficher la ligne de la requète que je cible
             */
            $resultDetailsAppointments = $allDetailsAppointments->fetch(PDO::FETCH_OBJ);
            // Si $resultDetailsPatient est un objet (existe dans la table)
            // On attribue directement les valeurs de l'objet
            if(is_object($resultDetailsAppointments)){
                // On récupère l'attribut de la classe
                $this->id = $resultDetailsAppointments->id;
                $this->lastname = $resultDetailsAppointments->lastname;
                $this->firstname = $resultDetailsAppointments->firstname;
                $this->date = $resultDetailsAppointments->date;
                $this->hour = $resultDetailsAppointments->hour;
                $this->idPatients = $resultDetailsAppointments->idPatients;
                $isCorrect = true;
            }
        }        
        // On retourne le resultat
        return $isCorrect;
    }
    
    
     public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }
}
