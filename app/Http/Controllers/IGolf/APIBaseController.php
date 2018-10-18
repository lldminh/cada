<?php

namespace App\Http\Controllers\IGolf;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class APIBaseController extends Controller
{
    public $body = array();

    public function pullData($timeStamp = null, $signature = null, $action = null){
      try{
        return $this->buildEndPoint($timeStamp, $signature, $action);
      }
      catch (Exception $e) {
        report($e);
        return false;
      }

    }

    public function buildEndPoint($timeStamp, $signature, $action){

      $appApiKey= env("appApiKey");
      $apiVersion= env("apiVersion");
      $sigVersion= env("sigVersion");
      $sigMethod= env("sigMethod");
      $responseFormat= \Config::get('constant.JSON_FORMAT');
      $appApiSecretKey=env("appApiSecretKey");
      $client = new Client(['base_uri' =>\Config::get("constant.external_api.igolf")]);
      $response = $client->request("POST", "/rest/action/$action/$appApiKey/$apiVersion/$sigVersion/$sigMethod/$signature/$timeStamp/$responseFormat",
      [
        'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
        'json' => [ "id_country" => "840"]
      ]);

      return $response;
    }
}
