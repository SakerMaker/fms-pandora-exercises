<?php
    require_once("../model/Appointment.php"); 
    // Receive the DNI field by ajax
    $dni = $_POST["dni"];
    // Calls static function checkDNI in user model to check if DNI already exists and prints it out to send the response to ajax
    if (Appointment::checkDNI($dni)) {
        print_r("true");
    } else {
        print_r("false");
    }
    
?>