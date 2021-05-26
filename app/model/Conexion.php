<?php
class conexion
{
    public $usuario = "root";
    public $contrasena = "root";

    public function conectar()
    {
        try
        {
            $pdo = new PDO("mysql:host=localhost;dbname=db", $this->usuario, $this->contrasena);
            return $pdo;
        }
        catch (\Throwable $th) {
            //echo "Error de conexion";
        }
    }
}
?>