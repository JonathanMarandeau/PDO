<?php
include 'Models/database.php';
include 'Models/patients.php';
include 'Models/appointments.php';
include 'Controllers/rendezvousController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Profil patient</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/profilPatient.css" />
    </head>
    <body>        
        <div class="contentPage">
            <div class="container">
                <h1 class="text-center">DETAILS DU RENDEZ-VOUS</h1>
                <div class="content text-center">                    
                    <form action="rendezvous.php?idAppointment=<?= $appointmentsList->id ?>" method="POST">
                        <?php if ($getDetailsListAppointments) { ?>  
                            <div class="col-12">
                                <label for="selectPatient">Patient : </label>
                                <select name="selectPatient">
                                    <?php foreach ($getListPatients AS $patient) { ?>
                                    <option value="<?= $patient->id ?>" <?= $patient->id == $appointmentsList->idPatients ? 'selected' : "" ?>><?= $patient->lastname . ' ' . $patient->firstname ?></option>
                                    <?php } ?>
                                </select>                                    
                                <input type="int" name="id" value="<?= $appointmentsList->id ?>" disabled />
                            </div>
                            <div class="col-12">
                                <label for="id">Identifiant : </label>
                                <input type="int" name="id" value="<?= $appointmentsList->id ?>" disabled />
                            </div>
                            <label for="lastname">Nom : </label><input type="text" name="lastname" value="<?= $appointmentsList->lastname ?>" /><br />
                            <label for="firstname">Prénom : </label><input type="text" name="firstname" value="<?= $appointmentsList->firstname ?>" /><br />
                            <label for="date">Date du rendez-vous : </label><input type="date" name="date" value="<?= $appointmentsList->date ?>" /><br />
                            <label for="hour">Heure du rendez-vous : </label><input type="time" name="hour" value="<?= $appointmentsList->hour ?>" /><br />                       
                        <?php } else { ?>
                            <p>Ce rendez-vous n'a pas été trouvé</p>
                        <?php } ?>
                        <div class="buttons">
                            <input type="submit" name="updateButton" value="MODIFIER" />
                            <a class="btn btn-dark" href="liste-rendezvous.php" role="button">RETOUR</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    </body>
</html>

