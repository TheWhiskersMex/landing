<?php
function secure_random_string($length)
{
    $random_string = '';
    for($i = 0; $i < $length; $i++)
    {
        $number = random_int(0, 36);
        $character = base_convert($number, 10, 36);
        $random_string .= strtoupper($character);
    }
    return $random_string;

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