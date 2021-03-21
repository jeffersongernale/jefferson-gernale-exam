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

    function store_yt_videos($data){
        $stmt = $this->connection->connect()->prepare('INSERT INTO youtube_channel_videos (channel_id, video_link, title , thumbnail, description)
        VALUES(?,?,?,?,?)');
        $stmt->bind_param('sssss', $data["channel_id"], $data["video_link"], $data["title"],  $data["thumbnail"],  $data["description"]); 
  
        echo $stmt->execute();

        // $sql = "INSERT INTO youtube_channel_videos (channel_id, video_link, title , description, thumbnail)
        // VALUES ('{$data["channel_id"]}', '{$data["video_link"]}', '{$data["title"]}', '{$data["description"]}', '{$data["thumbnail"]}')";

        // if (mysqli_query($this->connection->connect(), $sql)) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    function truncate_channel_video($channel_id){
        $stmt = $this->connection->connect()->prepare('DELETE FROM youtube_channel_videos WHERE channel_id = ?');
        $stmt->bind_param('s', $channel_id); 
        return $stmt->execute();
    }

    function get_video($channel_id){
        $stmt = $this->connection->connect()->prepare('SELECT * FROM youtube_channel_videos WHERE channel_id = ?');
        $stmt->bind_param('s', $channel_id); 
        $stmt->execute();
        $data = [];
        $result = $stmt->get_result(); // get the mysqli result
        while($row =  $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    
}