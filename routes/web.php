<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'my/page'], function(){


  Route::get('first', function(){
    $data['sidename']="TIEU";
    // Schema::rename('idiots', 'users');
    return View::make('child', $data);

  });

  Route::get('hash', 'GetIgolfCountryList@pullCountryList');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
