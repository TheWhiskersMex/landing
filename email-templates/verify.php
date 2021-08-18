<?php

if (!empty($_GET["email"]))
{
    // Declare variable and store it to email
    $email = $_GET["email"];
    
    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // Validate Email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email is a valid email address");
    }
    else {
        echo("$email is not a valid email address");
    }
} 
?>