<?php

namespace App\Helpers;

class Helper{

  public static function createSignature($timestampStr, $actionCode) {

          $appApiKey= env("appApiKey");
          $apiVersion= env("apiVersion");
          $sigVersion= env("sigVersion");
           $sigMethod= env("sigMethod");
           $responseFormat= \Config::get('constant.JSON_FORMAT');
           $appApiSecretKey=env("appApiSecretKey");

           $toSignStr = Helper::toSign($actionCode, $appApiKey, $apiVersion, $sigVersion, $sigMethod, $timestampStr, $responseFormat);
           $signature = null;
          try {
              $signature = Helper::calculateSignature($toSignStr, $sigMethod, $appApiSecretKey);
          } catch (\Exception $e) {
            report($e);
            return false;
          }
          return $signature;
  }

  private static function toSign($actionCode, $appApiKey, $apiVersion, $sigVersion,
  $sigMethod, $timestampStr, $responseFormat) {
         $builder = $actionCode."/"
                .$appApiKey."/"
                .$apiVersion."/"
                .$sigVersion."/"
                .$sigMethod."/"
                .$timestampStr."/"
                .$responseFormat;
        return $builder;
  }

  private static function calculateSignature($toSignStr, $signMethod,$secretKey) {

    try {
      $signMethod="sha256";

      $hmac = hash_hmac($signMethod, $toSignStr, $secretKey, TRUE);
      $signature = base64_encode($hmac);

      return $signature;

    } catch (\Exception $e) {
      report($e);
      return false;
    }
  }

}
