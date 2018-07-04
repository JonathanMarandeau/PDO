<?php
include 'Models/database.php';
include 'Models/patients.php';
include 'Models/appointments.php';
include 'Controllers/ajout-rendezvousController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Ajout d'un rendez-vous</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet" />
        <link rel="stylesheet" href="assets/ajoutPatient.css" />
    </head>
    <body>
        <div class="contentPage">
            <h1 class="text-center">Ajoutez un rendez-vous</h1>
            <div class="container formContent">
                <!-- Si le formulaire a bien été envoyé, on le notifie a l'utilisateur -->
                <?php if ($addSuccess) { ?>
                    <p>Formulaire envoyé !</p> 
                <?php } ?>               
                <form action="ajout-rendezvous.php" method="POST">
                    <div class="form-group">
                        <label for="choicePatient">Patient :</label>
                        <select class="choicePatient" name="choicePatient">
                            <option value="1" selected disabled>Choix</option>
                            <!-- boucle qui va lire le tableau des patients -->
                            <?php foreach ($getListPatients AS $listPatients) { ?>
                                <!-- dans la value de l'option je souhaite récupéré l'id de la liste des patients
                                     puis j'affiche le nom et le prénom du patient dans la liste déroulante --> 
                                <option value="<?= $listPatients->id ?>"><?= $listPatients->lastname . ' ' . $listPatients->firstname ?></option>
                            <?php } ?>
                        </select>
                        <p><?= isset($formError['choicePatient']) ? $formError['choicePatient'] : '' ?></p>
                    </div>                    
                    <div class="form-group">
                        <label for="dateAppointment">Date du rendez-vous : </label>
                        <input name="dateAppointment" type="date" class="form-control" id="dateAppointment" value="<?= isset($dateAppointment) ? $dateAppointment : '' ?>" />
                        <p><?= isset($formError['dateAppointment']) ? $formError['dateAppointment'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label for="hourAppointment">Heure du rendez-vous : </label>
                        <input name="hourAppointment" type="time" class="form-control" id="hourAppointment" value="<?= isset($hourAppointment) ? $hourAppointment : '' ?>" />
                        <p><?= isset($formError['hourAppointment']) ? $formError['hourAppointment'] : '' ?></p>
                    </div> 
                    <button type="submit" class="btn btn-dark" name="sendFormAppointment">AJOUTER RDV</button>
                    <a class="btn btn-dark" href="liste-rendezvous.php" role="button">LISTE RENDEZ-VOUS</a>
                    <a href="index.php" class="btn btn-dark" name="buttonReturn">RETOUR ACCUEIL</a>                    
                    <?php foreach ($formError AS $error) { ?>
                    <p><?= $error ?></p>
                    <?php } ?>                    
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    </body>
</html>


