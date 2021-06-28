<?php
session_start();
include_once ('../db/registry/function.php');
require_once('codegen.php');

if (!empty($_POST['firstname']) && !empty($_POST['lastname']))
{
    $message = '';
    $result = null;
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
    if ($result)
    {
        echo('
            <span>
            '. $message .'
            </span>
            ');
    }
    else
    {
        $_SESSION['status'] = "complete";
        echo('
            <script type="text/JavaScript">
            window.location.href = "correo.php";
            </script>
            ');
    }
}
if (!empty($_POST['password']) && !empty($_POST['birthdate']) && !empty($_POST['gender']))
{
    require_once("mailto.php");
    $_SESSION['password']  = trim($_POST['password']);
    $_SESSION['birthdate'] = trim($_POST['birthdate']);
    $_SESSION['gender']    = trim($_POST['gender']);

    $dt = new DateTime();
    $dt->setTimestamp(time());
    $mail = new MailTo();
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
        'codigo_verificacion' => secure_random_string(6),
        'otp'                 => $dt->format('Y-m-d H:i:s'),
        );

    $result = insert('esclavos', $data);

    if ($result && $mail->send($code, $_SESSION['email']))
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

        if (strcmp($otpcodea, $otpcodeb) != 0)
        {
            echo
            ('
               <script>
               alert("invalid code");
               </script>
           ');
            exit;
        }

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
        else
        {
            $data = array(
                'email_estatus' => 'verificado'
                );
            $result = update('esclavos', $data, "correo='" . $_SESSION['email'] . "'");
            if ($result)
            {
                $_SESSION['status'] = "veified";
                echo('
                <script>
                window.location.href = "completo.php";
                </script>
                ');
            }
        }
    }
}

if (!empty($_POST['newotpcode']) && !empty($_SESSION['email']))
{
    require_once("mailto.php");
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
        echo
        ('
        <script>
        alert("codigo enviado");
        </script>
        ');
    }
}
?>