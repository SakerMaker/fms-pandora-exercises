<?php
    require_once('Score.php');
    function getFileContents() {
        // Open file in read mode
        if ($fh = fopen('scores.csv', 'r')) {
            while ($row = fgetcsv($fh)) {
                // Saves each row info (username, digits and score) as an object in array $scores
                $scores[] = new Score($row[0], $row[1], $row[2]);
            }
        }
        return $scores;
    }
    

?>