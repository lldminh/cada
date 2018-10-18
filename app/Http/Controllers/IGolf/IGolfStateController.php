<?php

namespace App\Http\Controllers\IGolf;

use App\Http\Controllers\IGolf\APIBaseController;

use Illuminate\Http\Request;

use App\Helper;

use GuzzleHttp\Client;

class IGolfStateController extends APIBaseController
{
    public function pullDataIGolf(){
      try{
        $actionCode=\Config::get('constant.action.STATE_LIST');
        $signature="jrpp6bzeA0Szvg0BkHEbOAj2-ei5brh7vEnFYMAkEYU";
        $timeStamp="181009095701+0700";

        $igolfState = new IGolfStateController();
        $igolfState->body = [ "id_country" => "840"];

        $response = $igolfState->pullData($timeStamp, $signature, $actionCode);
        print_r($response->getBody()->getContents());exit;

      }
      catch (Exception $e) {
        report($e);
        return false;
      }

    }
}
