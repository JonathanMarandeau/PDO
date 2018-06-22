<?php 
// On inclut les models et le controller dnas la vue
include 'models/database.php';
include 'models/clients.php';
include 'controllers/indexController4.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>PDO Partie 1 Exercice 5</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <h1>N'afficher que les clients possédant une carte de fidélité</h1>
        <div class="content">        
            <table>
                <tr>                    
                    <th>Nom</th>
                    <th>Prénom</th>                     
                    <th>Carte</th>
                    <th>Numéro de carte</th>
                </tr>
                <!-- Boucle foreach pour lire le tableau ligne par ligne -->
                <?php foreach ($ownCardClientsList AS $onlyClientsOwnCard){ ?>
                <tr>                    
                    <td><?= $onlyClientsOwnCard->lastName ?></td>
                    <td><?= $onlyClientsOwnCard->firstName ?></td>                    
                    <td><?= $onlyClientsOwnCard->card ?></td>
                    <td><?= $onlyClientsOwnCard->cardNumber ?></td>
                </tr> 
                    <?php } ?>                
            </table>           
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    </body>
</html>


