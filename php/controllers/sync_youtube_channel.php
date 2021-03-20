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

   function getYoutubeChannelInfo(){
      $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&id=UCWJ2lWNubArHWmf3FIHbfcQ&key=AIzaSyC4hyFMKMkZ11ywVZtmCndlKFgAZjCyvB4");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        
        return $result;
   }

   function storeYoutubeChannelInfo(){
        $result = $this->getYoutubeChannelInfo();
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
                }
            }
        }
        
        if(count($dataToSave))
        {
            $res = $this->youtubeChannelModel->store($dataToSave);
            
            return $res;
            
        }

   }

}