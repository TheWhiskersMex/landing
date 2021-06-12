<?php
class Registry
{
	public function regnewMichi($name, $email, $michis)
	{
        $host     = 'us-cdbr-east-03.cleardb.com';
        $dbname   = 'heroku_d221bd92a1ad106';
        $user     = 'ba1a22ee47652d';
        $password = '5fb27cdd';
        $port     = 3306;
        $table    = 'kittysdb';
        $pdo      = null;

        try
        {
            // Init a new connection
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //Error Handling
            $pdo->setAttribute( PDO::ATTR_AUTOCOMMIT, true);
        }
        catch (PDOException $e)
        {
            // Unable to connect to the database!
            // print "Error: " . $e->getMessage() . "<br/>";
            return 1;
        }

        if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
            $origin = $_SERVER['HTTP_ORIGIN']; // HTTP Origin header
            echo($origin);
        }
        else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
            $origin = $_SERVER['HTTP_REFERER']; // HTTP Referer header
            echo($origin);
        }
        else {
            $origin = $_SERVER['REMOTE_ADDR']; // HTTP Client's Public IP
            echo($origin);
        }

        $pdo->beginTransaction();

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

        // Executes a query to verify if an email already exists in db
        $stmt = $pdo->prepare("SELECT * FROM $table WHERE email=:email");
        try
        {
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
            // The email address is already in the table
            return 2;
        }

        // Inserts a new registry
        unset($stmt); // Destroy the previous value
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
        $pdo->commit();
        return 0; //
    }
}

?>