<?php 


require_once "../connection.php";

class youtubeChannelModel
{
    public $connection;

    function __construct(){
        $this->connection = new Connection();
    }

    function store($data){
       
       
        $sql = "INSERT INTO youtube_channels (name, description, profile_picture, channel_id, subscribers)
        VALUES ('{$data["name"]}', '{$data["description"]}', '{$data["profile_picture"]}', '{$data["channel_id"]}', '{$data["subscribers"]}')";

        if (mysqli_query($this->connection->connect(), $sql)) {
            return true;
        } else {
            return false;
        }
        
    }

    function get_data($data){
        $sql = "SELECT id FROM youtube_channels WHERE channel_id = '{$data}' ";
        $result = $this->connection->connect()->query($sql);
        return $result->fetch_assoc();
    }

    function get_all_info(){
        $sql = "SELECT * FROM youtube_channels";
        $result = $this->connection->connect()->query($sql);
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
    }
}