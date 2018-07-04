<?php
// On instancie
$showListPatients = new patients();
// On appel la méthode getListPatients dans un objet showListPatients
$getListPatients = $showListPatients->getAllPatients();
// J'instancie un nouvelle objet 
$appointmentsList = new appointments();
if (isset ($_GET['idAppointment'])){
    $appointmentsList->id = $_GET['idAppointment'];
}

// On appel la méthode $getListAppointments dans un objet $appointmentsList
$getDetailsListAppointments = $appointmentsList->getAllDetailsAppointments();
