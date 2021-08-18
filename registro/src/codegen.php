<?php

/**
 * @param int $length
 * Generates an alphanumeric secure random string 
 */
function secure_random_string($length)
{
    $random_string = '';
    for($i = 0; $i < $length; $i++)
    {
        $number = random_int(0, 36); // Generates cryptographically secure pseudo-random integers
        $character = base_convert($number, 10, 36); // Convert a number between arbitrary bases Returns a string containing num represented in base to_base .
        $random_string .= strtoupper($character); // Make a string uppercase
    }
    return substr($random_string, 0, $length); // Returns generated string specified by the offset and length parameters.

    // CODE-GEN-1
    // $code = uniqid();
    // substr(sha1(time()), 0, 6);
    // CODE-GEN-2
    // $code = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // $code = substr(str_shuffle($code), 0, 6);
    // CODE-GEN-3
    // generate cryptographically secure pseudo-random bytes.
    // $code = strtoupper(bin2hex(random_bytes(6)));
}
?>