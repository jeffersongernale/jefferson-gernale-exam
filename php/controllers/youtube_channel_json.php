<?php
header("Access-Control-Allow-Origin: *");
require_once "../connection.php";
require_once "../models/youtubeChannelModel.php";

$call_func = new youtubeChannelJSON();

class youtubeChannelJSON {

    function __construct(){

        $this->youtubeChannelModel = new youtubeChannelModel();

        $urlParams = explode('/', $_SERVER['REQUEST_URI']);
        $functionName = $urlParams[5];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo $this->$functionName();
        }
        else
        {
            $functionName = $urlParams[5];
            $seperate_params_function = explode('?', $functionName);
            $functionToCall = $seperate_params_function[0];
            echo $this->$functionToCall();  
        }
        
   }

    function retrieveYTChannelInfo(){
        $result = $this->youtubeChannelModel->get_all_info();
        return json_encode($result);
    }

    function retrieveVideos(){
        $result = $this->youtubeChannelModel->get_video($_GET['id']);
        return json_encode($result);
    }


}