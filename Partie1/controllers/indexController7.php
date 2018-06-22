<?php
// On instancie l'objet shows
$listClientsDetail = new clients();
// On mets dans la variable ownCardClientsList l'appel de la méthode getOwnCardClientsList créé dans la class $clients
$getListClientsDetail = $listClientsDetail->getAllClients();
?>
