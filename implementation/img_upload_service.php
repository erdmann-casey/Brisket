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

//Create Services object to update Database
$services = new SERVICES();

$target_dir = "uploads/";
$file_rename = explode(".", basename($_FILES["file"]["name"]));
$file_rename = round(microtime(true)) . '.' . end($file_rename);
$target_file = $target_dir . $file_rename;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Image was not uploaded, Image already exists.<br/>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 15000000) {
    echo "Image size is too large. Must be less than 15mb<br/>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Only JPG, PNG, and GIF are valid image formats for upload!<br/>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "An issue or error occurred, your image was not uploaded.<br/>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $services->uploadImage($file_rename);
        $generateImageLink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/uploads/" . $file_rename;
        echo "<div class='col-md-12'><h3>Image URL: </h3><br/>" . '<img class="img-responsive" src="'. $generateImageLink .'"/><br/><a href="' . $generateImageLink . '">' . $generateImageLink . '</a></div>';
    } else {
        echo "An issue or error occurred, your file was not uploaded.";
    }
}
?>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>


