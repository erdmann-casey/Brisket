<html>
    <body>
        <h1>Unit Test</h1>

<?php


require 'services_handler.php';
echo "<b>Creating new Services() object</b>";
$services = new SERVICES();
echo "<br/><b>Executing runQuery(): <span style='color: grey;'>";
var_dump($services->runQuery("SELECT 1 FROM Images"));
echo "</span></b>";
echo "<br/>";
echo "<b>Testing Image API: ";
$imageAPI = exec("curl -i -F file=@/Users/Casey/Desktop/bbs\ flyer/bbs-discord.png http://localhost:8888/img_upload_service.php | grep Success");
if($imageAPI == "Success!"){
    echo "<span style='color: green;'>" . $imageAPI . "</span>";
}else{
    echo "<span style='color: red;'>Image API Test FAILED!</span>";
}
echo "</b>";
echo "<br/>";
echo "<b>Executing uploadImage(): ";
echo $services->uploadImage("Image Test");
echo "</b>";

?>