<?php

use Guzzle\Http\Client;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$getCountryList = new Client(IGOLF_ENDPOINT.'/rest/action/CountryList/{AppAPIKey}/{APIVersion}/{SignatureVersion}/{SignatureMethod}/{Signature}/{Timestamp}/{ResponseFormat}', array(
    'AppAPIKey'        => "$AppAPIKey",
    'APIVersion'        => "$APIVersion",
    'SignatureVersion'        => "$SignatureVersion",
    'SignatureMethod'        => "$SignatureMethod",
    'Signature'        => "$Signature",
    'Timestamp'        => "$Timestamp",
    'ResponseFormat'   => "$ResponseFormat",
    'request.options' => array(
        'body' => array('id_continent' => "")
    )
));

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
