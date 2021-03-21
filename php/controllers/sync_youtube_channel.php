<?php 
header("Access-Control-Allow-Origin: *");
require "../models/youtubeChannelModel.php";

$call_func = new youtubeChannel();


class youtubeChannel {
    public $youtubeChannelModel;
    function __construct(){
        $this->youtubeChannelModel = new youtubeChannelModel();

        $urlParams = explode('/', $_SERVER['REQUEST_URI']);
        $functionName = $urlParams[5];

        echo $this->$functionName();
   }

   function getYoutubeChannelInfo($channel_id){
       
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&id={$channel_id}&key=AIzaSyC4hyFMKMkZ11ywVZtmCndlKFgAZjCyvB4");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
   }

   function storeYoutubeChannelInfo(){
        $channel_id = $_POST['txt_channel_id'];
        $validation = $this->youtubeChannelValidation($channel_id);
        //check if channel id already exists
          if(!$validation)
          {
               //if not exists
               $result = $this->getYoutubeChannelInfo($channel_id);
               $dataToSave = [];
               $data = json_decode($result);
               foreach($data as $key => $value)
               {
                    if($key === "error")
                    {
                         return "error";
                    }

                    if(is_array($value))
                    {
                         
                         foreach($value as $val)
                         {
                              $dataToSave['name'] = $val->snippet->title;
                              $dataToSave['description'] = $val->snippet->description;
                              $dataToSave['profile_picture'] = $val->snippet->thumbnails->default->url;
                              $dataToSave['channel_id'] = $channel_id;
                              $dataToSave['subscribers'] = $val->statistics->subscriberCount;
                         }
                    }
               }

               if(count($dataToSave))
               {
                    $res = $this->youtubeChannelModel->store($dataToSave);
                    return $res;
               }
          }
          
          return "Channel already exits";
       

   }

   function youtubeChannelValidation($channel_id) {
        $result = $this->youtubeChannelModel->get_data($channel_id);
         
         if($result!=null)
         {
               return true;
         }
        
        return false;
   }

   function storeYTvideos(){
     $channel_id = $_POST['channel_id'];
     $id = $_POST['id'];
     $res = false;
    
     $truncate = $this->youtubeChannelModel->truncate_channel_video($id);
     
     if($truncate)
     {
          $result = $this->getYtVideosAPI($channel_id);
          foreach($result as $row){
               foreach($row as $value)
               {
                    $data = [];
                    $data['channel_id'] = $id;
                    $data['video_link'] = "https://www.youtube.com/watch?v=".$value->id->videoId;
                    $data['title'] = $value->snippet->title;
                    $data['description'] = $value->snippet->description;
                    $data['thumbnail'] = $value->snippet->thumbnails->default->url;
                   
                    $this->youtubeChannelModel->store_yt_videos($data);
               }
              
          }
          return json_encode($result);
     }
    
     
     return json_encode($res);
     
   }

   function getYtVideosAPI($channel_id){
     $data = [];
     $appendString = "";
     $nextPageToken = null;
     for($x = 0; $x < 2; $x++)
     {
          
          if($nextPageToken != null)
          {
               $appendString = "&pageToken={$nextPageToken}";
          }
          
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, "https://youtube.googleapis.com/youtube/v3/search?channelId={$channel_id}&key=AIzaSyAodXjap6Ptd7M7zDCvtRl6KHypk5ZtuF0&&part=snippet&order=date&maxResults=5&type=video{$appendString}");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $result = curl_exec($curl);
          curl_close($curl);
          $result = json_decode($result);    
          $data[] = $result->items;
          $nextPageToken = $result->nextPageToken;
     }
    
 
     return $data;
   }

}