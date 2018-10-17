<?php


namespace App\Http\Controllers;

use Schema;

use Illuminate\Http\Request;

class MyPageController extends Controller
{
    //
    public function index(){

      // Schema::rename('idiots', 'users');
      Schema::rename('idiots', 'users');
      return view("demo");
    }
}
