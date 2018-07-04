<?php

// On instancie un nouvel objet $appointments comme classe appointments
$appointments = new appointments();
$patients = new patients();
$getListPatients = $patients->getAllPatients();

//Création des regex pour controler les données rentré dans le formulaire
// Pour le nom et le prénom
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';
// Pour la date
$regexDate = '/^((19|20)[0-9]{2})\-(0[1-9]|1[012])\-(0[1-9]|([1-2][0-9])|3[01])$/';
// Pour l'heure
$regexHour = '/^([01]?[0-9]|2[0-3]):[0-5][0-9]/';

//Création d'un tableau pour retranscrire les erreurs lors du remplissage du formulaire
$formError = array();

// Variable addSuccess qui affichera un message si le formulaire est bien envoyé
$addSuccess = false;

// SELECT DU PATIENT
// Si le post existe alors
if (isset($_POST['choicePatient'])) {
    $appointments->idPatients = $_POST['choicePatient'];
    // Je vérifie que l'on récupère bien l'id du patient pour ne rien afficher d'autre (protection)
    if (is_nan($appointments->idPatients)) {
        $formError['idPatients'] = '*Veuillez sélectionner uniquement un patient de la liste';
    }
    // Si on envoi le formulaire et que la clé n'existe pas dans le post (pas selectionné la civilité) on affiche un message
    } else if (isset($_POST['sendFormAppointment']) && !array_key_exists('choicePatient', $_POST)) {
        $formError['choicePatient'] = '*Veuillez sélectionné un patient';
}



// DATE
if (isset($_POST['dateAppointment'])) {
    // Variable appointment qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
    $appointments->dateAppointment = htmlspecialchars($_POST['dateAppointment']);
    // On test que la variable n'est pas égale à la regeX
    if (!preg_match($regexDate, $appointments->dateAppointment)) {
        // J'affiche l'erreur
        $formError['dateAppointment'] = '*Votre date de rendez-vous doit être de type 15/05/1993';
    }
    // Si le post est vide
    if (empty($appointments->dateAppointment)) {
        // J'affiche le message d'erreur
        $formError['dateAppointment'] = '*Champs obligatoire';
    }
}

// HEURE
if (isset($_POST['hourAppointment'])) {
    // Variable appointment qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
    $appointments->hourAppointment = htmlspecialchars($_POST['hourAppointment']);
    // On test que la variable n'est pas égale à la regeX
    if (!preg_match($regexHour, $appointments->hourAppointment)) {
        // J'affiche l'erreur
        $formError['hourAppointment'] = '*Votre heure de rendez-vous doit être de type 23h59';
    }
    // Si le post est vide
    if (empty($appointments->hourAppointment)) {
        // J'affiche le message d'erreur
        $formError['hourAppointment'] = '*Champs obligatoire';
    }
}

//on vérifie que nous avons crée une entrée submit dans l'array $_POST, si présent on éxécute la méthode addAppointment()
if (count($formError) == 0 && isset($_POST['sendFormAppointment'])) {
    $appointments->dateHour = $_POST['dateAppointment'] . '  ' . $_POST['hourAppointment'];
    $appointmentMatch = $appointments->checkFreeAppointment();
    if (!is_object($appointmentMatch)){
        $formError['appointmentMatch'] = 'Un problème est survenu';
    } else {
        if ($appointmentMatch->takenAppointment){
            $formError['takenAppointment'] = 'RDV non disponible';
        } else {
            if (!$appointments->addAppointment()) {
            $formError['sendFormAppointment'] = 'l\'envoie du formulaire à échoué';
          } else {
            $addSuccess = true;
          }
        }
    }   
}
?>

