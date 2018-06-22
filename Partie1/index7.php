<?php 
// On inclut les models et le controller dnas la vue
include 'models/database.php';
include 'models/clients.php';
include 'controllers/indexController7.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <h1>Afficher tous les clients comme ceci :</h1>
        <h2>Nom : Nom de famille du client</h2>
        <h2>Prénom : Prénom du client</h2>
        <h2>Date de naissance : Date de naissance du client</h2>
        <h2>Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas)</h2>
        <h2>Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.</h2>
        <div class="content">
            <!-- Boucle foreach pour lire le tableau ligne par ligne et va me permettre d'afficher les 
                 le résulat demandé dans la requète -->
                <?php foreach ($getListClientsDetail AS $listClientsDetail){ ?>
            <p>Nom : <?= $listClientsDetail->lastName ?></p>
            <p>Prénom : <?= $listClientsDetail->firstName ?></p>
            <p>Date de naissance : <?= $listClientsDetail->birthDate ?></p>
            <p>Carte de fidélité : <?= $listClientsDetail->card ?></p>
            <!-- Condition pour dire que j'affiche le champs 'numéro de carte' seulement si le champs 'card'
                 répond 'oui' -->
                <?php if ($listClientsDetail->card == 'oui'){ ?>
            <p>Numéro de carte : <?= $listClientsDetail->cardNumber ?></p>
                    <?php } ?>
           
            <?php } ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    </body>
</html>


