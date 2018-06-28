<?php 
// EXO 3
$patients = new patients();
if (isset ($_GET['idPatient'])){
    $patients->id = $_GET['idPatient'];
}
$getAllDetailsPatient = $patients->getAllDetailsPatient();


// EXO 4
// Je récupère les controles du form de l'exo 1
///Création des regex pour controler les données rentré dans le formulaire
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
$regexPhone = '/^[0-9]{10,10}$/';
// Mise en place de regex type americain pour la date (elle se mets via le type date de l'input)
$regexBirthdate = '/^((19|20)[0-9]{2})\-(0[1-9]|1[012])\-(0[1-9]|([1-2][0-9])|3[01])$/'; 

//Création d'un tableau pour retranscrire les erreurs lord du remplissage du formulaire
$formError = array();
// Variable addSuccess qui affichera un message si le formulaire est bien envoyé
$addSuccess = false;

// NOM
// Si le post existe alors
if (isset($_POST['lastname'])) {
    // Variable lastname qui vérifie que les caractères speciaux soit converti en entité html (protection)
    $patients->lastname = htmlspecialchars($_POST['lastname']);
    // Si la variable lastname ne correspond pas à la regex
    if (!preg_match($regexName, $patients->lastname)) {
        // J'affiche l'erreur 
        $formError['lastname'] = 'Votre nom ne doit contenir que des lettres';
    }
    // Si le post lastname n'est pas rempli (donc vide)
    if (empty($patients->lastname)) {
        // J'affiche l'erreur 
        $formError['lastname'] = 'Champs obligatoire';
    }
}

// PRENOM
// Si le post existe alors
if (isset($_POST['firstname'])) {
    // Variable firstname qui vérifie que les caractères speciaux soit converti en entité html (protection)
    $patients->firstname = htmlspecialchars($_POST['firstname']);
    // Si la variable firstname ne correspond pas à la regex
    if (!preg_match($regexName, $patients->firstname)) {
        // J'affiche l'erreur
        $formError['firstname'] = 'Votre prénom ne doit contenir que des lettres';
    }
    // Si le post est vide
    if (empty($patients->firstname)) {
        // J'affiche le message d'erreur
        $formError['firstname'] = 'Champs obligatoire';
    }
}
// DATE DE NAISSANCE
//On test la valeur birthdate dans l'array $_POST, si elle existe via premier if
if (isset($_POST['birthdate'])) {
    // Variable birthdate qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
    $patients->birthdate = htmlspecialchars($_POST['birthdate']);
    // On test que la variable n'est pas égale à la regeX
    if (!preg_match($regexBirthdate, $patients->birthdate)) {
        // J'affiche l'erreur
        $formError['birthdate'] = 'Votre date de naissance doit être de type 15/05/1993';
    }
    // Si le post est vide
    if (empty($patients->birthdate)) {
        // J'affiche le message d'erreur
        $formError['birthdate'] = 'Champs obligatoire';
    }
}

// TELEPHONE
if (isset($_POST['phone'])) {
    $patients->phone = $_POST['phone'];
    if (!preg_match($regexPhone, $patients->phone)) {
        $formError['phone'] = 'Numéro invalide';
    }
    if (empty($patients->phone)) {
        $formError['phone'] = 'Champs obligatoire';
    }
}

// MAIL
if (isset($_POST['mail'])) {
    $patients->mail = $_POST['mail'];
    if (!preg_match($regexEmail, $patients->mail)) {
        $formError['mail'] = 'Saisie mail éroné !';
    }
    if (empty($patients->mail)) {
        $formError['mail'] = 'Champs obligatoire';
    }
}

//on vérifie que nous avons crée une entrée submit dans l'array $_POST, si présent on éxécute la méthode addPatient()
  if (count($formError) == 0 && isset($_POST['updateButton'])){
    if (!$patients->updatePatient()){
        $formError['updateButton'] = 'l\'envoie du formulaire à échoué';
    } else {
        $addSuccess = true;
    }
}
?>
