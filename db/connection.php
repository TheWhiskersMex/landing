<?php
class connector
{
    private $host     = 'us-cdbr-east-03.cleardb.com';
    private $dbname   = 'heroku_d221bd92a1ad106';
    private $user     = 'ba1a22ee47652d';
    private $password = '5fb27cdd';
    private $port     = 3306;
    private $table    = 'kittysdb';
    private $pdo      = null;

    function getConnection()
    {
        try
        {
            // Init a new connection
            $this->pdo = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname", $this->user, $this->password);
            $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //Error Handling
            $this->pdo->setAttribute( PDO::ATTR_AUTOCOMMIT, true);
        }
        catch (PDOException $e)
        {
            // Unable to connect to the database!
            // print "Error: " . $e->getMessage() . "<br/>";
            $this->pdo = null;
        }
        return $this->pdo;
    }
}
?>