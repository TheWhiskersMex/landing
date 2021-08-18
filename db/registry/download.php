<?php
if(@$_POST['download'])
{
    require_once('../config/config.php');
    require_once('function.php');
    $rows = queryAll($table, 'ORDER BY date');
    $file = './database.xml';

    /* create a dom document with encoding utf8 */
    $domtree = new DOMDocument('1.0', 'UTF-8');
    $domtree->preserveWhiteSpace = false;
    $domtree->formatOutput = true;
    /* create the root element of the xml tree */
    $xmlRoot = $domtree->createElement('xml');
    /* append it to the document created */
    $xmlRoot = $domtree->appendChild($xmlRoot);
    
    while ($row = mysqli_fetch_object($rows))
    {
        $user = $domtree->createElement('usuario');
        $user = $xmlRoot->appendChild($user);
        $user->appendChild($domtree->createElement('id',       $row->ID));
        $user->appendChild($domtree->createElement('nombre',   $row->name));
        $user->appendChild($domtree->createElement('email',    $row->email));
        $user->appendChild($domtree->createElement('michis',   $row->michis));
        $user->appendChild($domtree->createElement('fecha',    $row->date));
    }
    @$domtree->save($file);

    // Define header information
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Length: ' . filesize($file));
    header('Pragma: public');

    // Clear system output buffer
    flush();
    // Read the size of the file
    @readfile($file);
}
?>
