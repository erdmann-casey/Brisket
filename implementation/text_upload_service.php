<?php

require_once 'services_handler.php';

//Create Services object to update Database
$services = new SERVICES();

$uploadOk = 0;

$uploadText = '';


// Check if text is null
if(isset($_POST["uploadText"])){
   $uploadOk = 1;
   $uploadText = $_POST["uploadText"];
}


// Check text size
if (strlen($uploadText) >= 500) {
    echo "Too many characters. Must be less than 500<br/>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "An issue or error occurred, your text was not posted.<br/>";
// if everything is ok, try to upload text
} else {
        $textID = $services->uploadText($uploadText);
        $generateTextLink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/text_fetch_service.php?id=" . $textID;
        echo "Text URL: <br/>" . '<a href="' . $generateTextLink . '">' . $generateTextLink . '</a>';
}
?>
