<?php

/**
 * Database Config - All Database Configuration Information Can Be Found Here
 */

/**
 * Database class, handles the connection to the database
 */


class Database{

    //change all of this
    private $host = "localhost"; //site url
    private $db_name = "BrisketDB"; //db_name
    private $username = "root"; //sql user
    private $password = "root"; //sql pass
    public $conn;


  /**
  * Connects the web application to the database.
  *
  * Uses PDO object to construct a database connection. This database connection can be used across multiple classes to query the database configured by the Database class.
  *
  * @return object $this->conn (the connection to the database)
  */

  public function dbConnection(){

       $this->conn = null;

          try{
              $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
              $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }
        catch(PDOException $exception){
                  echo "Connection error: " . $exception->getMessage();
                  return "Detected error during database connection check!";
              }

            return $this->conn;
        }
}
?>
