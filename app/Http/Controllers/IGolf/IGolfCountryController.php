<?php

namespace App\Http\Controllers\IGolf;

use App\Http\Controllers\IGolf\APIBaseController;

use Illuminate\Http\Request;

use App\Helper;

use GuzzleHttp\Client;

class IGolfCountryController extends APIBaseController
{
  public function pullDataIGolf(){
    try{
      $actionCode=\Config::get('constant.action.COUNTRY_LIST');
      $signature="2Vo_loq-7BWEwoJVJ-RhlB2sUTakHQJ6hPm9M4UNMok";
      $timeStamp="181009100816+0700";

      $igolfState = new IGolfCountryController();
      $igolfState->body = ["id_continent" => "NA"];

      $response = $igolfState->pullData($timeStamp, $signature, $actionCode);
      print_r($response->getBody()->getContents());exit;

    }
    catch (Exception $e) {
      report($e);
      return false;
    }

  }

}
