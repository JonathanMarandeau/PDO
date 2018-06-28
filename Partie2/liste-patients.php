<?php
include 'Models/database.php';
include 'Models/patients.php';
include 'Controllers/showListPatients.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Liste des patients</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/listePatients.css" />
    </head>
    <body>
        <div class="contentPage">
            <div class="container">
                <h1>Liste des patients</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Profil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Boucle foreach pour lire le tableau ligne par ligne et va me permettre d'afficher les 
                                 le résulat demandé dans la requète -->
                            <?php foreach ($getListPatients AS $patientDetails) { ?>
                                <tr>
                                    <th scope="row"><?= $patientDetails->id ?></th>
                                    <td><?= $patientDetails->lastname ?></td>
                                    <td><?= $patientDetails->firstname ?></td>
                                    <td><a href="profil-patient.php?idPatient=<?= $patientDetails->id ?>">Profil</a></td>
                                </tr>                           
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
                <a class="btn btn-dark" href="ajout-patient.php" role="button">Créer un nouveau patient</a>
                <a class="btn btn-dark" href="index.php" role="button">Retour accueil</a>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    </body>
</html>
