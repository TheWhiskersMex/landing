<?php
class Registry
{
	public function regnewMichi($name, $email, $michis)
	{
        require_once('../db/config/config.php');
        $pdo = null;
        try
        {
            // Init a new connection
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //Error Handling
            $pdo->setAttribute( PDO::ATTR_AUTOCOMMIT, true);
        }
        catch (PDOException $e)
        {
            // Unable to connect to the database!
            // print "Error: " . $e->getMessage() . "<br/>";
            return 1;
        }
        $sql = "CREATE TABLE IF NOT EXISTS $table(
                ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR( 250 ) NOT NULL,
                email VARCHAR( 250 ) NOT NULL,
                michis VARCHAR( 150 ) NOT NULL,
                date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);";
        try
        {
            // Creates a new table if does not exists
            $pdo->exec($sql);
        }
        catch (PDOException $e)
        {
            // Unable to create the new table
            return 1;
        }
        try
        {
            // Executes a query to verify if an email already exists in db
            $stmt = $pdo->prepare("SELECT * FROM $table WHERE email=:email");
            $stmt->bindParam(":email", $email);
        }
        catch (PDOException $e)
        {
            return 1; // Binding error
        }
        if (!($stmt->execute()))
        {
            // Error executing the prepared statement
            return 1;
        }
        $query = $stmt->fetch(); // Fetches the row
        if ($query)
        {
            // The email address is already registered
            return 2;
        }
        unset($stmt); // Destroy the previous value
        // Inserts a new registry
        $stmt = $pdo->prepare("INSERT INTO $table (name, email, michis) VALUES (:name, :email, :michis)");
        try
        {
            $stmt->bindParam(":name",       $name);
            $stmt->bindParam(":email",      $email);
            $stmt->bindParam(":michis",     $michis);
        }
        catch (PDOException $e)
        {
            // Binding error
            return 1;
        }
        if ($stmt->execute())
        {
            //echo "Datos guardados correctamente";
        }
        else
        {
            //echo "Oh no, hubo algun error";
            return 1;
        }
        return 0; //
    }
}
?>