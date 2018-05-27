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
  	Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'login']);
  	Route::post('/login', ['uses' => 'AuthController@doLogin', 'as' => 'doLogin']);
  	Route::get('/signup', ['uses' => 'AuthController@signup', 'as' => 'signup']);
  	Route::post('/signup', ['uses' => 'AuthController@register', 'as' => 'register']);
  });

  Route::group(['middleware' => ['auth']], function(){
    Route::get('/', ['uses' => 'AuthController@dashboard', 'as' => 'dashboard']);
    Route::get('/profile/{id}', ['uses' => 'UserController@profile', 'as' => 'profile']);
    Route::get('/update/{id}', ['uses' => 'UserController@edit', 'as' => 'edit']);
  	Route::post('/update/{id}', ['uses' => 'UserController@update', 'as' => 'update']);
    Route::get('/logout', ['uses' => 'AuthController@logout', 'as' => 'logout']);


    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
      Route::get('/users', ['uses' => 'UserController@index', 'as' => 'users']);
      Route::get('/users/add', ['uses' => 'UserController@add', 'as' => 'users.add']);
      
      Route::get('/roles', ['uses' => 'RoleController@index', 'as' => 'roles']);
      Route::get('/role/add', ['uses' => 'RoleController@add', 'as' => 'role.add']);
      Route::get('/role/delete/{id}', ['uses' => 'RoleController@destroy', 'as' => 'role.delete']);
      Route::get('/role/update/{id}', ['uses' => 'RoleController@edit', 'as' => 'role.edit']);
      Route::post('/role/update/{id}', ['uses' => 'RoleController@update', 'as' => 'role.update']);

      Route::get('/permissions', ['uses' => 'PermissionController@index', 'as' => 'permissions']);
      // Route::get('/permissions/update/{id}', ['uses' => 'PermissionController@edit', 'as' => 'permission.edit']);
    });
  });

});
