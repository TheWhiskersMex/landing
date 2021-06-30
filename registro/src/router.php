<?php
session_start();
define('ROOT', '/');

if (isset($_SERVER['REQUEST_URI']))
{
    switch ($_SERVER['REQUEST_URI'])
    {
        case ROOT . 'registro/index.php':
            break;

        case ROOT . 'registro/':
            //switch(@$_SESSION['status'])
            //{
            //    case 'complete':
            //        header('location: correo.php');
            //        break;
            //    case 'registered':
            //  }
            //      header('location: verificacion.php');
            //        break;
            //    case 'verified':
            //        header('location: completo.php');
            //        break;
            //    default:
            //        header('location: registro.php');
            //        break;
            //}
            header('location: registro.php');
            break;

        case ROOT . 'registro/correo.php':
            if (!(@$_SESSION['status'] === 'complete'))
            header('location: registro.php');
            break;

        case ROOT . 'registro/verificacion.php':
            if (!(@$_SESSION['status'] === 'registered'))
            header('location: registro.php');
            break;

        case ROOT . 'registro/completo.php':
            if (!(@$_SESSION['status'] === 'verified'))
            header('location: registro.php');
            $_SESSION['status'] = "loggedin";
            break;

        case ROOT . 'registro/profile.php':
            if (!(@$_SESSION['status'] === "loggedin"))
                header('location: registro.php');
            break;

        default:
            // echo 'access denied!';
            break;
    }
}
?>