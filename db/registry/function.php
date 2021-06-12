<?php
function db_query($query)
{
    $connection = mysqli_connect("us-cdbr-east-03.cleardb.com","ba1a22ee47652d","5fb27cdd","heroku_d221bd92a1ad106");
    if (!$connection)
	{
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    exit;
    }
    $result = mysqli_query($connection, $query);
    return $result;
}
function insert($table, $form_data)
{
	$fields = array_keys($form_data);
	$sql = "INSERT INTO ".$table."(".implode(',', $fields).")  VALUES('".implode("','", $form_data)."')";
	return db_query($sql);

}
function select_datos($table, $field_name, $field_id){
	$sql = "Select * from ".$table." where ".$field_name." = ".$field_id."";
	$db = db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);
	return $sql;
}
?>
