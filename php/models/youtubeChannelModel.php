<?php 


require_once "../connection.php";

class youtubeChannelModel
{
    public $connection;

    function __construct(){
        $this->connection = new Connection();
    }

    function store($data){
       
       
        $sql = "INSERT INTO youtube_channels (name, description, profile_picture)
        VALUES ('{$data["name"]}', '{$data["description"]}', '{$data["profile_picture"]}')";

        if (mysqli_query($this->connection->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
        
    }
}