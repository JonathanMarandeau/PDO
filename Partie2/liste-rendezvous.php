<?php 
include 'Models/database.php';
include 'Models/patients.php';
include 'Models/appointments.php';
include 'Controllers/liste-rendezvousController.php';?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Liste des rendez-vous</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet" />
        <link rel="stylesheet" href="assets/listeRendezvous.css" />
    </head>
    <body>
        <div class="contentPage">
            <div class="container">
                <h1 class="text-center">Liste des rendez-vous de l'hôpital</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Nom du patient</th>
                                <th scope="col">Prénom du patient</th>
                                <th scope="col">Date du rendez-vous</th>
                                <th scope="col">Heure du rendez-vous</th>
                                <th scope="col">Détails du rendez-vous</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Boucle foreach pour lire le tableau ligne par ligne et va me permettre d'afficher les 
                                 le résulat demandé dans la requète -->
                            <?php foreach ($getListAppointments AS $getListAppointment) { ?>
                                <tr>
                                    <!-- Permet d'afficher le nom du rendez-vous -->
                                    <td><?= $getListAppointment->lastname ?></td>
                                    <!-- Permet d'afficher le prénom du rendez-vous -->
                                    <td><?= $getListAppointment->firstname ?></td>
                                    <!-- Permet d'afficher la date du rendez-vous -->
                                    <td><?= $getListAppointment->date ?></td> 
                                    <!-- Permet d'afficher l'heure du rendez-vous -->
                                    <td><?= $getListAppointment->hour ?></td>
                                    <!-- Permet d'afficher le details du rendez-vous -->
                                    <td><a href="rendezvous.php?idAppointment=<?= $getListAppointment->id ?>">Détails</a></td>
                                </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <a class="btn btn-dark" href="ajout-rendezvous.php" role="button">Créer un nouveau patient</a>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    </body>
</html>


