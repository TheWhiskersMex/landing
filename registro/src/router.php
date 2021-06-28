<?php
session_start();
if (isset($_SERVER['REQUEST_URI']))
{
    switch ($_SERVER['REQUEST_URI'])
    {
        case '/landing/registro/index.php':
            break;

        case '/landing/registro/':
            //switch(@$_SESSION['status'])
            //{
            //    case 'complete':
            //        header('location: correo.php');
            //        break;
            //    case 'registered':
            //        header('location: verificacion.php');
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

        case '/landing/registro/correo.php':
            if (!(@$_SESSION['status'] === "complete"))
            header('location: index.php');
            break;

        case '/landing/registro/verificacion.php':
            if (!(@$_SESSION['status'] === 'registered'))
            header('location: index.php');
            break;

        case '/landing/registro/completo.php':
            if (!(@$_SESSION['status'] === 'verified'))
            header('location: index.php');
            $_SESSION['status'] = "loggedin";
            break;

        case '/landing/registro/profile.php':
            if (!(@$_SESSION['status'] === "loggedin"))
                header('location: registro.php');
            break;

        default:
            // echo 'access denied!';
            break;
    }
}
?>