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
            // Init a new conection
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //Error Handling
        }
        catch (\Throwable $th)
        {
            // echo "Error de conexion";
            return 1;
        }

        $pdo->beginTransaction();

        try
        {
            // Creates a new table if does not exists
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
            // echo "Tabla no pudo crearse";
            return 1;
        }

        // Executes a query to verify if an email already exists in db
        $stmt = $pdo->prepare("SELECT * FROM $table WHERE email=:mail");
        $stmt->bindParam(":mail", $email);
        $stmt->execute();
        
        if ($query = $stmt->fetch())
        {
            return 2;
        }

        // Inserts a new registry (ROW)
        $stmt = $pdo->prepare("INSERT INTO $table (name, email, michis) VALUES (:name, :email, :michis)");
        $stmt->bindParam(":name",       $name);
        $stmt->bindParam(":email",      $email);
        $stmt->bindParam(":michis",     $michis);
        
        if ($stmt->execute())
        {
            //echo "Datos guardados correctamente";
        }
        else
        {
            //echo "Oh no, hubo algun error";
            return 1;
        }
        $pdo->commit();
        return 0;
    }
}

?>