<?php
session_start();
require_once('./src/config.php');
require_once('../db/registry/function.php');
require_once('./src/codegen.php');
require_once('./src/mailto.php');

// Form 1, registry
if (!empty($_POST['firstname']) && !empty($_POST['lastname']))
{
    $message = ''; // message to show has feedback
    $result = null; // result error-code
    $table = 'esclavos'; // database table
    $_SESSION['network']    = 'whiskers';
    $_SESSION['firstname']  = trim($_POST['firstname']);
    $_SESSION['lastname']   = trim($_POST['lastname']);
    $_SESSION['thumbnail']  = '';

    if (!empty($_POST['email']))
    {
        $_SESSION['email']      = strtolower(trim($_POST['email']));
        $message = 'El correo que ingresaste ya se encuentra registrado.';
        // Query the current email address if does already exists in the db
        $result = query($table, 'correo', trim($_POST['email']));
        $_SESSION['phone'] = 0; // null if the user uses an email address to register
    }

    else if (!empty($_POST['phone']))
    {
        $_SESSION['phone']      = trim($_POST['phone']);
        $message = 'El teléfono que ingresaste ya se encuentra registrado.';
        // Query the current phone number if does already exists in the db
        $result = query($table, 'telefono', trim($_POST['phone']));
        $_SESSION['email'] = 'null'; // null if the user uses a phone number to register
    }
    else
    {
        exit;
    }
    if ($result && $result->email_estatus == 'no verificado')
    {
        // User registered but not verified
        echo(
            '
            <script type="text/JavaScript">
            alert("'.$message.'\nporfavor verifica tu cuenta. ");
            window.location.href = "verificacion.php?email=true";
            </script>`
            '
        );
    }
    else if ($result)
    {
        // Email/Phone is already registered
        echo('
            <span>
            '. $message .'
            </span>
            ');
    }
    else
    {
        // Redirects to the next form
        echo('
            <script type="text/JavaScript">
            window.location.href = "correo.php";
            </script>
            ');
    }
}
// Form 2, registry
if (!empty($_POST['password']) && !empty($_POST['birthdate']) && !empty($_POST['gender']))
{
    $_SESSION['password']  = trim($_POST['password']);
    $_SESSION['birthdate'] = trim($_POST['birthdate']);
    $_SESSION['gender']    = trim($_POST['gender']);

    $mail = new MailTo();
    $dt = new DateTime(); // set a new date
    $dt->setTimestamp(time()); // saves the current timestamp
    $code = secure_random_string(6); // generates a new 6 length code

    $data = array(
        'nombre'              => $_SESSION['firstname'],
        'apellidos'           => $_SESSION['lastname'],
        'correo'              => $_SESSION['email'],
        'telefono'            => $_SESSION['phone'],
        'password'            => 'aes_encrypt("' . $_SESSION['password'] . '","' . $_SESSION['password'] . '")',
        'fecha_nacimiento'    => $_SESSION['birthdate'],
        'sexo'                => $_SESSION['gender'],
        'email_estatus'       => 1,
        'codigo_verificacion' => $code,
        'otp'                 => $dt->format('Y-m-d H:i:s'),
        );

    $result = insert('esclavos', $data); // inserts a new registry to the db
    $email = $mail->send($code, $_SESSION['email']); // sends a new verification code

    if ($result && $email) // if the new registry and the email has been sent
    {
        // redirects to the verification code
        $_SESSION['status'] = 'registered';
        echo('
            <script>
            window.location.href = "verificacion.php";
            </script>
        ');
    }
}

// Form 3, verification code

if (!empty($_POST['otpcode']) && !empty($_SESSION['email']))
{
    $table = 'esclavos';
    $result = query($table, 'correo', $_SESSION['email']); // return the row that match the current email
    if ($result)
    {
        $otp = strtotime($result->otp); // sets the time from the db
        $otpcodea = $_POST['otpcode']; // gets the user typed code
        $otpcodeb = $result->codigo_verificacion; // saves the verification code

        $dta = new DateTime(); // instance a new date
        $dta->setTimestamp(time()); // set a new timestamp from the current time

        $dtb = new DateTime(); // 
        $dtb->setTimestamp($otp); // set a new timestamp from the saved time

        $elapsed_time = date_diff($dta, $dtb); // compares the difference between two DateTimeInterface objects.

        if (strcmp($otpcodea, $otpcodeb) != 0) // compares two codes if it does not match 
        { // the code is not correct
            echo
            ('
               <script>
               alert("El codigo que ingresaste no es valido.");
               </script>
           ');
            exit;
        }
        else if ( // else if 10 minutes has been passed: the code if expired
            $elapsed_time->y > 0 || // Years
            $elapsed_time->m > 0 || // Months
            $elapsed_time->d > 0 || // Days
            $elapsed_time->h > 0 || // Hours
            $elapsed_time->i > 9)   // Minutes
        {
            echo
            ('
              <script>
              alert("El codigo que ingresaste ha expirado.");
              </script>
           ');
        }
        else
        { // the verification code has been verified
            $data = array('email_estatus' => 'verificado');
            $result = update('esclavos', $data, "correo='" . $_SESSION['email'] . "'");
            if ($result)
            {   // sets the email status tu verified
                $_SESSION['status'] = "verified";
                echo('
                <script>
                window.location.href = "completo.php";
                </script>
                ');
            }
        }
    }
}

if (!empty($_POST['code']) && !empty($_SESSION['email']))
{
    $mail = new MailTo();
    $dt = new DateTime();
    $dt->setTimestamp(time());
    $otpcode = secure_random_string(6);
    $email = $_SESSION['email'];

    $data = array(
        'codigo_verificacion' => $otpcode,
        'otp'                 => $dt->format('Y-m-d H:i:s'));

    $result = update('esclavos', $data, "correo='" . $email . "'");
    if ($result && $mail->send($otpcode, $email))
    {
        // Verification code has been sent
        echo
        ('
        <script>
        alert("codigo enviado");
        </script>
        ');
    }
}

// OAuth aunthentication (Google, Facebook)

if (!empty($_POST['method']) && $_POST['method'] === 'oauth')
{
    $table = 'esclavos';
    $_SESSION['phone']      = 0; 
    // saves each 
    $_SESSION['provider']   = $_POST['network'];
    $_SESSION['firtsname']  = $_POST['firstname'];
    $_SESSION['lastname']   = $_POST['lastname'];
    $_SESSION['email']      = $_POST['email'];
    $_SESSION['thumbnail']  = $_POST['thumbnail'];

    // Creates a new key/value array from the global variables
    $data = array(
        'nombre'              => $_SESSION['firstname'],
        'apellidos'           => $_SESSION['lastname'],
        'correo'              => $_SESSION['email'],
        'telefono'            => $_SESSION['phone'],
        'password'            => 'aes_encrypt(" ", " ")',
        'email_estatus'       => 2,
        'provider'            => $_SESSION['provider'],
        'avatar'              => $_SESSION['thumbnail']);
    // verifies if the current email is already registered
    $result = query($table, 'correo', $_SESSION['email']);
    if ($result)
    { // the email is already registered  
        echo('
        <script>
        window.location.href = "completo.php";
        </script>
        ');
        exit;
    }
    if (insert($table, $data))
    { // register the new user
        echo('
        <script>
        window.location.href = "completo.php";
        </script>
        ');
    }
}
//if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
//    $origin = $_SERVER['HTTP_ORIGIN']; // HTTP Origin header
//    echo($origin);
//}
//else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
//    $origin = $_SERVER['HTTP_REFERER']; // HTTP Referer header
//    echo($origin);
//}
//else {
//    $origin = $_SERVER['REMOTE_ADDR']; // HTTP Client's Public IP
//    echo($origin);
//}
?>