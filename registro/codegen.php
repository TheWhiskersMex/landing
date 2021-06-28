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
}
?>