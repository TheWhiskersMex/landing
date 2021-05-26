<?php

class Registry
{
	public function regnewMichi($name, $email, $michis)
	{
        // $host     = 'localhost';
        // $port     = 3306;
        // $socket   = "";
        // $user     = "root";
        // $password = 'root';
        // $dbname   = 'heroku_d221bd92a1ad106';

        $host     = 'us-cdbr-east-03.cleardb.com';
        $port     = 3306;
        $socket   = "";
        $user     = "ba1a22ee47652d";
        $password = '5fb27cdd';
        $dbname   = 'heroku_d221bd92a1ad106';
        $table    = "kittysdb";
        $pdo      = null;

        try
        {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        }
        catch (\Throwable $th)
        {
            echo "Error de conexion";
            return false;
        }

        $pdo->beginTransaction();

        try
        {
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
            $sql ="CREATE TABLE IF NOT EXISTS $table(
                ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR( 250 ) NOT NULL,
                email VARCHAR( 250 ) NOT NULL,
                michis VARCHAR( 150 ) NOT NULL);";
            $pdo->exec($sql);
            // echo "Tabla creada";
        }
        catch (\Throwable $th)
        {
            echo "Tabla no pudo crearse";
            return false;
        }

        $stmt = $pdo->prepare("INSERT INTO $table (name, email, michis) VALUES (:name, :email, :michis)");
        
        $stmt->bindParam(":name",       $name);
        $stmt->bindParam(":email",      $email);
        $stmt->bindParam(":michis",     $michis);
        
        if ($stmt->execute())
        {
            echo "Datos guardados correctamente";
        }
        else
        {
            echo "Oh no, hubo algun error";
            return false;
        }
        $pdo->commit();
        return true;
    }
}

?>