<?php

require_once 'services_handler.php';

//Create Services object to update Database
$services = new SERVICES();

$id = $_GET['id'];

//Fetch and display text
$text = $services->getText($id);

echo $text;

?>
