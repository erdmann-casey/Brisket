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
        echo "Image URL: <br/>" . '<a href="' . $generateImageLink . '">' . $generateImageLink . '</a>';
    } else {
        echo "An issue or error occurred, your file was not uploaded.";
    }
}
?>


