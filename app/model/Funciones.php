<?php
include_once '../model/Conexion.php';

class app extends conexion
{
    public function registrar_usuario($datos)
    {
        $pdo = conexion::conectar();
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("INSERT INTO usuario (Nombre, Direccion, Telefono, Correo, Contrasena, Contrato) 
        VALUES (:nombre, :direccion, :telefono, :correo, :contrasena, :contrato)");
        
        $telefono = (int)$datos['telefono'];
        $stmt->bindParam(":nombre",     $datos['nombre']);
        $stmt->bindParam(":direccion",  $datos['direccion']);
        $stmt->bindParam(":telefono",   $telefono);
        $stmt->bindParam(":correo",     $datos['correo']);
        $stmt->bindParam(":contrasena", $datos['contrasena']);
        $stmt->bindParam(":contrato",   $datos['contrato']);
        
        if ($stmt->execute())
        {
            $correo = array("correo" => $datos['correo']);
            $this->consultar_usuario($correo);
        }
        else
        {
            $error = array("error" => 'true');
            echo json_encode($error);
        }
        $pdo->commit();
    }
    public function validar_usuario($datos)
    {
        $pdo = conexion::conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE Correo=:correo AND Contrasena=:contrasena");
        $stmt->bindParam(":correo",     $datos['correo']);
        $stmt->bindParam(":contrasena", $datos['contrasena']);
        $stmt->execute();
        if ($usuario = $stmt->fetch())
        {
            echo json_encode($usuario);
        }
    }
    public function consultar_usuario($datos)
    {
        $pdo = conexion::conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE Correo=:correo");
        $stmt->bindParam(":correo", $datos['correo']);
        $stmt->execute();

        if ($usuario = $stmt->fetch())
        {
            echo json_encode($usuario);
        }
    }
}

?>