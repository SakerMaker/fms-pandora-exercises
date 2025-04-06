<?php
    require_once("../model/Appointment.php"); 
    // Receives current time
    $date = new DateTime();

    // Both of these variables will save the assigned hour and date for the appointment
    $assigned_hour = null;
    $assigned_date = null;

    $initial_hour = new DateTime("10:00");
    $ending_hour = new DateTime('22:00');

    // Loop that keeps checking for an available DAY
    while ($assigned_date == null) {
        // Resets loop hour to the initial one (10 AM)
        $current_hour = clone $initial_hour;

        // Loop that keeps checking for an available HOUR (between the 10AM-22PM range)
        while ($current_hour <= $ending_hour) {
            // Format date and time for the DB
            $format_hour = $current_hour->format("H:i");
            $format_date = $date->format("Y-m-d");

            // Checks if current loop hour is available in current loop day
            if (Appointment::checkLastHour($format_date,$format_hour)) {
                $assigned_hour = $format_hour;
                $assigned_date = $format_date;
                // If it finds some available time, it breaks the loop
                break 2;
            } else {
                $current_hour->add(new DateInterval('PT1H'));
            }
        }
        $date->add(new DateInterval('P1D'));
    }

    // If both hours and dates are assigned, it creates appointment
    if ($assigned_hour != null && $assigned_date != null) {
        $appointment = new Appointment($_POST["name"],$_POST["dni"],$_POST["phone"],$_POST["email"],$_POST["type"],$assigned_date,$assigned_hour);
        try {
            $appointment->insert();
            print_r("Tu cita se ha registrado correctamente.");
        } catch (Exception $e) {
            print_r("Ocurrió un error al registrar la cita.");
        }
    } else {
        print_r("No se pudo asignar una cita.");
    }
    
?>