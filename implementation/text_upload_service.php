<html lang="en">

<head>
    <title>Brisket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark justify-content-between">
        <div class="container">
            <form class="form-inline">
                <a class="navbar-brand" href="index.html">Brisket</a>
                <button class="btn btn-primary btn-sm" type="button" style="margin-right:16px">+New Paste</button>
                <button class="btn btn-success btn-sm" type="button">+New Image</button>
            </form>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search..</button>
            </form>
        </div>
    </nav>

    <hr>

<?php

require_once 'services_handler.php';

/**
 * Text Upload Service - Allows users to upload text to the database
 */

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

if(strlen($uploadText) == 0){
    echo "Posts can not be empty<br/>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "An issue or error occurred, your text was not posted.<br/>";
// if everything is ok, try to upload text
} else {
        $textID = $services->uploadText($uploadText);
        $generateTextLink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/text_fetch_service.php?id=" . $textID;
        echo "<div class='col-md-12'><h3>Text URL: </h3><br/>" . '<div class="col-md-8"><textarea readonly rows="10" class="form-control">'. $uploadText .'</textarea><a href="' . $generateTextLink . '">' . $generateTextLink . '</a></div></div>';
}
?>


  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>
