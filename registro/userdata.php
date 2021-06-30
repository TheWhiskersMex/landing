<?php
session_start();
require_once('./src/config.php');
require_once('../db/registry/function.php');
require_once('./src/codegen.php');
require_once('./src/mailto.php');

if (!empty($_POST['firstname']) && !empty($_POST['lastname']))
{
    $message = '';
    $result = null;
    $table = 'esclavos';
    $_SESSION['network']    = 'whiskers';
    $_SESSION['firstname']  = trim($_POST['firstname']);
    $_SESSION['lastname']   = trim($_POST['lastname']);
    $_SESSION['thumbnail']  = '';

    if (!empty($_POST['email']))
    {
        $_SESSION['email']      = trim($_POST['email']);
        $message = 'El correo que ingresaste ya se encuentra registrado.';
        $result = query($table, 'correo', trim($_POST['email']));
        $_SESSION['phone'] = 0;
    }
    else if (!empty($_POST['phone']))
    {
        $_SESSION['phone']      = trim($_POST['phone']);
        $message = 'El teléfono que ingresaste ya se encuentra registrado.';
        $result = query($table, 'telefono', trim($_POST['phone']));
        $_SESSION['email'] = 'null';
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
            </script>
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
        echo('
            <script type="text/JavaScript">
            window.location.href = "correo.php";
            </script>
            ');
    }
}
if (!empty($_POST['password']) && !empty($_POST['birthdate']) && !empty($_POST['gender']))
{
    $_SESSION['password']  = trim($_POST['password']);
    $_SESSION['birthdate'] = trim($_POST['birthdate']);
    $_SESSION['gender']    = trim($_POST['gender']);

    $mail = new MailTo();
    $dt = new DateTime();
    $dt->setTimestamp(time());
    $code = secure_random_string(6);

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

    $result = insert('esclavos', $data);
    $email = $mail->send($code, $_SESSION['email']);

    if ($result && $email)
    {
        $_SESSION['status'] = 'registered';
        echo('
            <script>
            window.location.href = "verificacion.php";
            </script>
        ');
    }
}

if (!empty($_POST['otpcode']) && !empty($_SESSION['email']))
{
    $table = 'esclavos';
    $result = query($table, 'correo', $_SESSION['email']);
    if ($result)
    {
        $otp = strtotime($result->otp);
        $otpcodea = $_POST['otpcode'];
        $otpcodeb = $result->codigo_verificacion;

        $dta = new DateTime();
        $dta->setTimestamp(time());

        $dtb = new DateTime();
        $dtb->setTimestamp($otp);

        $elapsed_time = date_diff($dta, $dtb);

        if ($elapsed_time->y > 0 || // Years
            $elapsed_time->m > 0 || // Months
            $elapsed_time->d > 0 || // Days
            $elapsed_time->h > 0 || // Hours
            $elapsed_time->i > 9)   // Minutes
        {
            echo
            ('
              <script>
              alert("code expired");
              </script>
           ');
        }
        else if (strcmp($otpcodea, $otpcodeb) != 0)
        {
            echo
            ('
               <script>
               alert("invalid code");
               </script>
           ');
            exit;
        }
        else
        {
            $data = array('email_estatus' => 'verificado');
            $result = update('esclavos', $data, "correo='" . $_SESSION['email'] . "'");
            if ($result)
            {
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

if (!empty($_POST['method']) && $_POST['method'] === 'oauth')
{
    $_SESSION['phone']      = 0;
    $_SESSION['provider']   = $_POST['network'];
    $_SESSION['firtsname']  = $_POST['firstname'];
    $_SESSION['lastname']   = $_POST['lastname'];
    $_SESSION['email']      = $_POST['email'];
    $_SESSION['thumbnail']  = $_POST['thumbnail'];

    $data = array(
        'nombre'              => $_SESSION['firstname'],
        'apellidos'           => $_SESSION['lastname'],
        'correo'              => $_SESSION['email'],
        'telefono'            => $_SESSION['phone'],
        'password'            => 'aes_encrypt(" ", " ")',
        'email_estatus'       => 2,
        'provider'            => $_SESSION['provider'],
        'avatar'              => $_SESSION['thumbnail']);

    if (insert('esclavos', $data))
    {
        echo('
        <script>
        window.location.href = "completo.php";
        </script>
        ');
    }
}
?>