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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['web']], function(){  
  Route::group(['middleware' => ['guest']], function(){
    Route::get('/', ['uses' => 'AuthController@index', 'as' => 'index']);
    
  	Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'login']);
  	Route::post('/login', ['uses' => 'AuthController@doLogin', 'as' => 'doLogin']);
  	Route::get('/signup', ['uses' => 'AuthController@signup', 'as' => 'signup']);
  	Route::post('/signup', ['uses' => 'AuthController@register', 'as' => 'register']);
  });

  Route::group(['middleware' => ['auth']], function(){
  	Route::get('/', function() {
  	  return view('index');
  	});
  });
});
