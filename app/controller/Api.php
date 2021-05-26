<?php
include_once '../model/Funciones.php';

$oj_usuario = new app();
$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST['accion']) )
{
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'registrar_u':
            $oj_usuario->registrar_usuario($_POST);
            break;
        case 'validar_u':
            $oj_usuario->validar_usuario($_POST);
            break;
        case 'consultar_u':
            $oj_usuario->consultar_usuario($_POST);
            break;
        default:
            //echo "\nAccion no disponible\n";
            break;
    }
}
?>