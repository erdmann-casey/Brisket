<html>
    <body>
        <h1>Unit Test</h1>

<?php

$url = $_POST['url'];

$totalTests = 8;
$completedTests = 0;

require 'services_handler.php';
echo "<h2><u>Services Testing:</u></h2>";
echo "<b>Creating new Services() object...</b>";
$services = new SERVICES();
$completedTests++;
echo "<h2><u>Image Service Testing:</u></h2>";
echo "<b>Executing runQuery(): <span style='color: grey;'>";
var_dump($services->runQuery("SELECT 1 FROM Images"));
echo "</span></b>";
echo "<br/>";
$completedTests++;
echo "<b>Testing Image API: ";
$imageAPI = exec("curl -i -F file=@test-image.png http://" . $url . "/img_upload_service.php | grep Image");
if($imageAPI){
    echo "<span style='color: green;'>" . $imageAPI . "</span>";
    $completedTests++;
}else{
    echo "<span style='color: red;'>Image API Test FAILED!</span>";
}
echo "</b>";
echo "<br/>";
echo "<b>Executing uploadImage(): ";
echo $services->uploadImage("Image Test");
echo "</b>";
$completedTests++;
echo "<h2><u>Text Service Testing:</u></h2>";
echo "<b>Executing runQuery(): <span style='color: grey;'>";
var_dump($services->runQuery("SELECT 1 FROM Text"));
echo "</span></b>";
echo "<br/>";
$completedTests++;
echo "<b>Testing Text API: ";
$textURL = 'http://'. $url .'/text_upload_service.php';

//cURL call for text service test
$data = array(
    'uploadText' => "This is a Unit Test",
    'submit' => 'submit'
);
$postString = http_build_query($data, '', '&');
$ch = curl_init($textURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$textAPI = curl_exec($ch);
curl_close($ch);

if($textAPI){
    echo "<span style='color: green;'>" . $textAPI . "</span>";
    $completedTests++;
}else{
    echo "<span style='color: red;'>Image API Test FAILED!</span>";
}
echo "<br/>";
echo "<b>Executing uploadText(): ";

$textID = $services->uploadText("Text Test");

if($textID){
    echo "<span style='color: green;'>PASS</span>";
    $completedTests++;
}else{
    echo "<span style='color: red;'>FAIL</span>";
}

echo "</b>";
echo "<br/>";
echo "<b>Executing getText(): ";
if($services->getText($textID)){
    echo "<span style='color: green;'>PASS</span>";
    $completedTests++;
}else{
    echo "<span style='color: red;'>FAIL</span>";
}
echo "</b>";

if($completedTests == $totalTests){
    echo "<h3 style='color: green;'>100% Complete. All tests have <b>PASSED</b></h3>";
    echo "<b><i>Be sure to manually check runQuery() execution output for errors</i></b>";
}else{
    $failedRate = ($completedTests/$totalTests) * 100;
    echo "<h3 style='color: red;'> Completed ". $failedRate ."% tests have <b>FAILED</b>. Check output above for details</h3>";
}

?>

    </body>
</html>