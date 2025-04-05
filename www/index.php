<!-- INDEX FILE FOR EXERCISE 2
 
    Please note, all files inside controller, model and views folders are related to this exercise. The only folder which isn't related to this project is exercise1.

    Exercise summary:
    I've replicated an MVC structure for this exercise. Controller folder contains the DNI checks and the appointment reservation calls. Further explanation in each file.
    Model folder contains the Appointment class with its respective CheckDNI and CheckLastHour functions. Further explanation in the file comments.
    Last but not least, the views folder contains the styles and ajax script. Further explanation in the file comments.

    This index file contains the form.
    
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedir Cita - Pandora FMS</title>
    <link rel="stylesheet" href="views/styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="views/js/validate.js"></script>
</head>
<body>
    
    <div>
        <div class="nav">
            <ul>
                <li><a href="exercise1">Ejercicio 1</a></li>
                <li><a href="#" class="active">Ejercicio 2</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div>
            <form action="" method="POST" required class="appointment" id="appointment">
                <input type="text" name="name" id="name" required placeholder="Introduce tu nombre" maxlength="32">
                <input type="text" name="dni" id="dni" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="Introduce tu DNI">
                <input type="number" name="phone" id="phone" required placeholder="Introduce tu teléfono" maxlength="9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                <input type="email" name="email" id="email" required placeholder="Introduce tu correo electrónico">
                <select name="type" id="type" >
                    <option value="" class="disabled" disabled selected>Tipo de cita</option>
                </select>
                <button type="submit" name="send">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>