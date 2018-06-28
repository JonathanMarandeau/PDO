<?php

class patients extends database {
    
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '01/01/2001';
    public $phone = '0606060606';
    public $mail = '';
    
    public function __construct() {
        // On appelle le construct du parent
        parent::__construct();
    }
    /*
     *  AJOUT D'UN PATIENT (EXO 1)
     *  Je crée une methode qui va me permettre d'ajouter dans la bdd
     *  les champs rempli dans le formulaire
     */
    public function addPatient() {
         // Insertion des données du patient à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
        $addPatient = $this->db->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $addPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $addPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $addPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $addPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $addPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        // on utilise la méthode execute() via un return
        return $addPatient->execute();
    }
    
    // LISTE DES PATIENTS (EXO 2)
    public function getAllPatients() {
        /* On mets notre requète dans la variable query
         * Je veux les nom et prénoms des patients             
         */
        $query = 'SELECT `id`, `lastname`, `firstname` FROM `patients`';
        // On crée une variable $listAllPatients qui exécute la requète $query avec la méthode query
        $listAllPatients = $this->db->query($query);
        /* On crée la variable $resultList qui va nous permettre de retourner le resultat 
         * La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet
         */
        $resultList = $listAllPatients->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }
    
    // DETAILS PATIENT (EXO 3)
    public function getAllDetailsPatient(){
        $isCorrect = false;
        /*
         * Je souhaite récupérer toutes les informations concernant les patients présente dans la table patients
         */
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id';
        // On crée une variable $allDetailsPatient qui exécute la requète $query avec la méthode prepare
        $allDetailsPatient = $this->db->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $allDetailsPatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        // on utilise la méthode execute() via un return
        if ($allDetailsPatient->execute()){
            /* On crée la variable $resultDetailsPatient qui va nous permettre de retourner le resultat 
             * La fonction fetch permet d'afficher la ligne de la requète que je cible
             */
            $resultDetailsPatient = $allDetailsPatient->fetch(PDO::FETCH_OBJ);
            // Si $resultDetailsPatient est un objet (existe dans la table)
            // On attribue directement les valeurs de l'objet
            if(is_object($resultDetailsPatient)){
                // On récupère l'attribut de la classe
                $this->lastname = $resultDetailsPatient->lastname;
                $this->firstname = $resultDetailsPatient->firstname;
                $this->birthdate = $resultDetailsPatient->birthdate;
                $this->phone = $resultDetailsPatient->phone;
                $this->mail = $resultDetailsPatient->mail;
                $isCorrect = true;
            }
        }        
        // On retourne le resultat
        return $isCorrect;
    }
    
    // MODIFIER PATIENT(EXO 4)
    public function updatePatient() {
        $query = 'UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE `id` = :id';
        $modifyPatient = $this->db->prepare($query);
        $modifyPatient->bindValue (':id', $this->id, PDO::PARAM_STR);
        $modifyPatient->bindValue (':lastname', $this->lastname, PDO::PARAM_STR);
        $modifyPatient->bindValue (':firstname', $this->firstname, PDO::PARAM_STR);
        $modifyPatient->bindValue (':birthdate', $this->birthdate, PDO::PARAM_STR);
        $modifyPatient->bindValue (':phone', $this->phone, PDO::PARAM_STR);
        $modifyPatient->bindValue (':mail', $this->mail, PDO::PARAM_STR);
        return $modifyPatient->execute();
        
    }
    
    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }
}
