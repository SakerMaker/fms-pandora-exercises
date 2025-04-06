$(document).ready(function() {
    // Checks on DNI field when you unfocus the DNI field
    $('#dni').on('blur', function() {
        var dni = $(this).val();
        var dniRegex = /^[0-9]{8}[A-Z]$/; // Example: 8 digits followed by an uppercase letter

        // Validate DNI format on blur
        if (!dniRegex.test(dni)) {
            alert('El DNI no tiene un formato válido.');
            return;
        }
        
        $.ajax({
            url: '../../controller/check_dni.php',
            type: 'POST',
            // Sends DNI field
            data: { dni: dni },
            success: function(response) {
                // Deletes previous "Options" on the forms select
                $('#type').empty();
                // If response is false (DNI doesn't exist on the database)...
                if (response === "false") {
                    // And if the option is not added in the select yet... "First check" gets added as an option
                    if ($('#type option[value="first_time"]').length == 0) {
                        $('#type').append('<option value="first_time">Primera consulta</option>');
                    }
                } else {
                    // Then check is added on the option
                    if ($('#type option[value="check"]').length == 0) {
                        $('#type').append('<option value="check">Revisión</option>');
                    }
                }
            }
        });
    });

    // Even though there is an HTML validation, I've added ajax validation for extended security and accesibility

    $('#appointment').on('submit', function(e) {
        e.preventDefault();
        // Check that fields aren't empty
        if ($('#name').val() === '' || $('#dni').val() === '' || $('#phone').val() === '' || $('#email').val() === '') {
            alert('Completa todos los campos.');
            return;
        }

        // Validate DNI format
        var dni = $('#dni').val();
        var dniRegex = /^[0-9]{8}[A-Z]$/; // Example: 8 digits followed by an uppercase letter
        if (!dniRegex.test(dni)) {
            alert('El DNI no tiene un formato válido.');
            return;
        }
        $.ajax({
            url: '../../controller/reserve.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // I reset the form here because it solves a big issue, if I didn't delete all the values on here, it would allow the user to send infinite
                // first-time check appointments.
                $('#appointment').trigger("reset");
                alert(response);
            }
        });
    });
});