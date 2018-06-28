<?php
// J'inclus les models database et patients pour exécuter mes requètes 
include 'Models/database.php';
include 'Models/patients.php';
// J'inclus le controller 'addPatientController.php' pour controller les champs du formulaire
include 'Controllers/addPatientController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Ajout d'un patient</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet" /> 
        <link rel="stylesheet" href="assets/ajoutPatient.css" />
    </head>
    <body>
        <div class="contentPage">
            <h1 class="text-center">Formulaire d'ajout de patient</h1>  
            <div class="formContent container">
                <!-- Si le formulaire a bien été envoyé, on le notifie a l'utilisateur -->
                <?php
                if ($addSuccess) {
                    echo 'Formulaire envoyé';
                }
                ?>
                <form action="ajout-patient.php" method="POST">               
                    <!-- NOM -->
                    <div class="container">
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">
                                <label for="lastname">Nom :</label>
                                <!-- La partie php permet de garder sur le formulaire ce qui a été rentré par l'utilisateur-->
                                <input type="text" name="lastname" id="lastname" placeholder="Nom du patient" value="<?= isset($lastname) ? $lastname : '' ?>" />
                                <p><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                            </div>
                        </div>
                        <!-- PRENOM -->
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">
                                <label for="firstname">Prénom :</label>
                                <input type="text" name="firstname" id="firstname" placeholder="Prénom du patient" value="" />
                                <p><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                            </div>
                        </div>
                        <!-- ANNIVERSAIRE -->
                        <div class="form-row">                         
                            <div class="form-group col-lg-12 text-center">
                                <label for="birthdate">Date de naissance :</label>
                                <input type="date" name="birthdate" id="birthdate" value="" />
                                <p><?= isset($formError['birthdate']) ? $formError['birthdate'] : '' ?></p>
                            </div>
                        </div>
                        <!-- TELEPHONE -->
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">
                                <label for="phone">Téléphone :</label>
                                <input type="tel" name="phone" id="phone" placeholder="Téléphone du patient" value=""  />
                                <p><?= isset($formError['phone']) ? $formError['phone'] : '' ?></p>
                            </div>
                        </div>
                        <!-- EMAIL -->
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">  
                                <label for="mail">E-mail :</label>
                                <input type="email" name="mail" id="mail" placeholder="E-mail du patient" value=""  />
                                <p><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p> 
                            </div>                           
                        </div>
                    </div>
                    <div class="text-center buttonSend">
                        <input type="submit" name="sendForm" value="AJOUTER" />
                    </div>
            </div>
        </form>
        <div class="container">
            <a class="btn btn-dark" href="liste-patients.php" role="button">LISTE PATIENTS</a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>


