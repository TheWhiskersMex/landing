<?php
function db_query($query)
{
    global $host; global $username; global $password; global $dbname; global $port;
    $connection = @mysqli_connect($host, $username, $password, $dbname, $port);
    if (!$connection) { exit; } // Error: Unable to connect to MySQL. mysqli_connect_errno()
    $result = @mysqli_query($connection, $query);
    return $result;
}
function insert($table, $array_data)
{
    $fields = array_keys($array_data);
    $sql = "INSERT INTO " . $table . "(" . implode(',', $fields) . ")  VALUES('" . implode("','", $array_data) . "')";
    return db_query($sql);
}
function buildString($array_data)
{
    $string = '';
    foreach ($array_data as $key => $value)
    {
        $string .= $key . "='" . $value . "', ";
    }
    return rtrim($string, ', ');
}
function update($table, $array_data, $condition)
{
    $sql = "UPDATE " . $table . " SET " . buildString($array_data) . " WHERE " . $condition;
    $db = db_query($sql);
    return $db;
}
function query($table, $field_name, $field_value)
{
    $sql = 'SELECT * FROM ' . $table . ' WHERE ' . $field_name . ' = "' . $field_value . '"';
    $db = db_query($sql);
    return @mysqli_fetch_object($db);
}
function queryAll($table, $flags = '')
{
    $sql = "SELECT * FROM " . $table . " " . $flags;
    $db = db_query($sql);
    return @mysqli_fetch_object($db);
}
?>
