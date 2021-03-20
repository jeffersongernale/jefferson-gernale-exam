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
        echo $this->$functionName();
        
   }

    function retrieveYTChannelInfo(){
        $result = $this->youtubeChannelModel->get_all_info();
        
        return json_encode($result);
    }
}