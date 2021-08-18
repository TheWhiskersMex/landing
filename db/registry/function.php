<?php
/**
 * @param string $query
 * init the connection using global variables from an external file then
 * Performs a query on the database.
 */
function db_query($query)
{
    global $host; global $username; global $password; global $dbname; global $port;
    $connection = @mysqli_connect($host, $username, $password, $dbname, $port);
    if (!$connection) { exit; } // Error: Unable to connect to MySQL. mysqli_connect_errno()
    $result = @mysqli_query($connection, $query);
    return $result;
}
/**
 * @param string $table
 * @param array $array_data
 * Insert a row into a table from an key/value array
 */
function insert($table, $array_data)
{
    $fields = array_keys($array_data);
    $sql = "INSERT INTO " . $table . "(" . implode(',', $fields) . ")  VALUES('" . implode("','", $array_data) . "')";
    return db_query($sql);
}
/**
 * @param array $array_data
 * creates a new string from an key/value array 
 */
function buildString($array_data)
{
    $string = '';
    foreach ($array_data as $key => $value)
    {
        $string .= $key . "='" . $value . "', ";
    }
    return rtrim($string, ', ');
}
/**
 * @param string $table
 * @param array $array_data
 * @param string $condition
 * updates a table from an key/value array with the especified condition
 */
function update($table, $array_data, $condition)
{
    $sql = "UPDATE " . $table . " SET " . buildString($array_data) . " WHERE " . $condition;
    $db = db_query($sql);
    return $db;
}
/**
 * @param string $table
 * @param string $field_name
 * @param string $field_value
 * Excecutes a query with the especified condition: $field_name = $field_value
 * Returns the current row of a result set as an object
 */
function query($table, $field_name, $field_value)
{
    $sql = 'SELECT * FROM ' . $table . ' WHERE ' . $field_name . ' = "' . $field_value . '"';
    $db = db_query($sql);
    return @mysqli_fetch_object($db);
}
/**
 * @param string $table
 * @param string $flags
 * Performs a query on the database Performs a query against the database.
 * then returns each row as a set of objects
 */
function queryAll($table, $flags = '')
{
    $sql = "SELECT * FROM " . $table . " " . $flags;
    $db = db_query($sql);
    return $db;
}
?>
