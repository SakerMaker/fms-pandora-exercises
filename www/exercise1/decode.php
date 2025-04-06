<?php
  function decode($encoded, $digits) {
    // Calculates base by the digits length
    $base = strlen($digits);

    // Calculates length of the encoded number
    $length = strlen($encoded);

    // Variable used for adding each characters value, used as the result
    $decoded = 0;
    
    // Loop that reads and decodes each character
    for ($i = 0; $i < $length; $i++) {
      // Reads current character on the loop
      $char = $encoded[$i];

      // Searches current characters position
      $pos = strpos($digits, $char);

      // Last $decoded value (stars with 0) multiplied by base, sums position
      $decoded = $decoded * $base + $pos;
    }

    return $decoded;
}
?>