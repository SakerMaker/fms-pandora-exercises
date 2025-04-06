<!-- INDEX FILE FOR EXERCISE 

    Please note, all files inside exercise1 are related to this exercise. ONLY this folder contains files for this project.

    Exercise summary:

    I wasn't sure if reading the CSV file was needed. I added it anyway in case it was.
    First, from this file, I call both read_file and decode files, which includes the functions to read the CSV file and decode its code. Each files have their own comments for better understanding.
    Then, I sort the associative array in descending order and print the result as desired.

-->

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Técnica - Pandora FMS</title>
    <link rel="stylesheet" href="../views/styles/style.css">
</head>
<body>
    
    <div>
        <div class="nav">
            <ul>
                <li><a href="#" class="active">Ejercicio 1</a></li>
                <li><a href="../">Ejercicio 2</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div>
            <?php
                require("read_file.php");
                require("decode.php");

                // Reading the CSV file (read_file.php)
                $scores = getFileContents();

                // Decodes each row using decode function (decode.php) into an associative array with its respective username on the key 
                foreach ($scores as $score) {
                    $decoded_score[$score->getUsername()] = decode($score->getScore(),$score->getDigits());
                }

                // Sort the associative array in descending order
                arsort($decoded_score);
                
                // Prints result as desired
                foreach ($decoded_score as $username => $score) {
                    print_r("<p>".$username.",".$score."\n<p/>");
                }
            ?>
        </div>
        
    </div>
</body>
</html>