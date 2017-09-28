<?php


//Service handler, any functions to update or pull down data from the DB are here

require_once('db_config.php');

class SERVICES{

 private $conn;

 public function __construct(){
  $database = new Database();
  $db = $database->dbConnection();
  $this->conn = $db;
    }

 public function runQuery($sql){
  $stmt = $this->conn->prepare($sql);
  return $stmt;
 }


public function uploadImage($img_name){

    try{
        $stmt = $this->runQuery("INSERT INTO Images (`ImgName`) VALUES(:img_name)");
        $stmt->execute(array(":img_name" => $img_name));
        return "<span style='color: green;'>Image Upload Success!</span>"; 
      }
      catch(PDOException $ex){
       echo $img_name;
       echo $ex->getMessage();
       return "<span style='color: red;'>Error Occurred Uploading Image!</span>";
    
      }
    

}


public function uploadText($text){
  try{
      $stmt = $this->runQuery("INSERT INTO Text (`Text`) VALUES(:text)");
      $stmt->execute(array(":text" => $text));
      $textID = $this->conn->lastInsertId();
      return $textID; 
    }
    catch(PDOException $ex){
    echo $ex->getMessage();
    return "<span style='color: red;'>Error Occurred Uploading Text!</span>";

  }
}

public function getText($id){
  try{
    $stmt = $this->runQuery("SELECT (`Text`) FROM Text WHERE (`TextID`) = (:id)");
    $stmt->execute(array(":id" => $id));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['Text']; 
  }
  catch(PDOException $ex){
  echo $ex->getMessage();
  return "<span style='color: red;'>Error Occurred Could not locate Text!</span>";

}
}

}
?>
