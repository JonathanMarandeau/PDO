<?php
include 'Models/database.php';
include 'Models/patients.php';
include 'Controllers/detailsPatient.php';
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
                <h1 class="text-center">PROFIL DU PATIENT</h1>
                <div class="content text-center">
                    <!-- Si le formulaire a bien été envoyé, on le notifie a l'utilisateur -->
                    <?php if ($addSuccess) { ?>
                        <p>Modifications effectuées !</p>    
                    <?php } ?>
                    <form action="profil-patient.php?idPatient=<?= $patients->id ?>" method="POST">
                        <?php if ($getAllDetailsPatient) { ?>                       
                            <label for="id">Identifiant : </label><input type="int" name="id" value="<?= $patients->id ?>" disabled /><br />
                            <label for="lastname">Nom : </label><input type="text" name="lastname" value="<?= $patients->lastname ?>" /><br />
                            <label for="firstname">Prénom : </label><input type="text" name="firstname" value="<?= $patients->firstname ?>" /><br />
                            <label for="birthdate">Date de naissance : </label><input type="date" name="birthdate" value="<?= $patients->birthdate ?>" /><br />
                            <label for="phone">Téléphone : </label><input type="tel" name="phone" value="<?= $patients->phone ?>" /><br />
                            <label for="mail">E-mail : </label><input type="mail" name="mail" value="<?= $patients->mail ?>" />                        
                        <?php } else { ?>
                            <p>Ce patient n'a pas été trouvé</p>
                        <?php } ?>
                        <div class="buttons">
                            <input type="submit" name="updateButton" value="MODIFIER" />
                            <a class="btn btn-dark" href="liste-patients.php" role="button">RETOUR</a>
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
