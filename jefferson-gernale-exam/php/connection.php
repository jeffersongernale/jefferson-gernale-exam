<?php



class Connection{

  public $conn;
  function connect(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "youtube_db";

    // Create connection
    $this->conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
   
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->$conn->connect_error);
    }
    return $this->conn; 
  }
}

