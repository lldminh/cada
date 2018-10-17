<?php
namespace App\Helpers;

class Helper{

  public static function createSignature(var $timestampStr,var $actionCode) {

          var $appApiKey= env("appApiKey");
          var $apiVersion= env("apiVersion");
          var $sigVersion= env("sigVersion");
          var $sigMethod= env("sigMethod");
          var $responseFormat= \Config::get('constant.JSON_FORMAT');
          var $appApiSecretKey=env("appApiSecretKey");

          var $toSignStr = toSign($actionCode, $appApiKey, $apiVersion, $sigVersion, $sigMethod, $timestampStr, $responseFormat);
          var $signature = null;
          try {
              $signature = calculateSignature($toSignStr, $sigMethod, $appApiSecretKey);
          } catch (\Exception $e) {
            report($e);
            return false;
          }
          return $signature;
  }

  private function toSign(var $actionCode, var $appApiKey, var $apiVersion, var $sigVersion,
  var $sigMethod, var $timestampStr, var $responseFormat) {
        var $builder = $actionCode."/".
                .$appApiKey."/".
                .$apiVersion."/".
                .$sigVersion."/".
                .$sigMethod."/".
                .$timestampStr."/".
                .$responseFormat;
        return $builder;
  }

  private function calculateSignature(var $toSignStr, var $signMethod,var $secretKey) {

    try {
      $signMethod="sha1";

      $hmac = hash_hmac($signMethod, $toSignStr, $secretKey, TRUE);
      $signature = base64_encode($hmac);

      return $signature;

    } catch (\Exception $e) {
      report($e);
      return false;
    }
  }

 ?>
