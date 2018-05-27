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
    // Route::get('/update/{id}', ['uses' => 'UserController@edit', 'as' => 'edit']);
  	// Route::post('/update/{id}', ['uses' => 'UserController@update', 'as' => 'update']);
    Route::get('/logout', ['uses' => 'AuthController@logout', 'as' => 'logout']);


    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {  
      Route::get('/permissions', ['uses' => 'PermissionController@index', 'as' => 'permissions']);
      
      Route::get('/roles', ['uses' => 'RoleController@index', 'as' => 'roles']);
      Route::get('/role/add', ['uses' => 'RoleController@add', 'as' => 'role.add']);
      Route::post('/role/add', ['uses' => 'RoleController@create', 'as' => 'role.create']);
      Route::get('/role/delete/{id}', ['uses' => 'RoleController@destroy', 'as' => 'role.delete']);
      Route::get('/role/update/{id}', ['uses' => 'RoleController@edit', 'as' => 'role.edit']);
      Route::post('/role/update/{id}', ['uses' => 'RoleController@update', 'as' => 'role.update']);

      Route::get('/users', ['uses' => 'UserController@index', 'as' => 'users']);
      Route::get('/user/add', ['uses' => 'UserController@add', 'as' => 'user.add']);
      Route::post('/user/add', ['uses' => 'UserController@create', 'as' => 'user.create']);
      Route::get('/user/update/{id}', ['uses' => 'UserController@edit', 'as' => 'user.edit']);
      Route::post('/user/update/{id}', ['uses' => 'UserController@update', 'as' => 'user.update']);
      Route::get('/user/delete/{id}', ['uses' => 'UserController@destroy', 'as' => 'user.delete']);
      
      Route::get('/posts', ['uses' => 'PostController@index', 'as' => 'posts']);
      Route::get('/post/add', ['uses' => 'PostController@add', 'as' => 'post.add']);
      Route::post('/post/add', ['uses' => 'PostController@create', 'as' => 'post.create']);
      Route::get('/post/update/{id}', ['uses' => 'PostController@edit', 'as' => 'post.edit']);
      Route::post('/post/update/{id}', ['uses' => 'PostController@update', 'as' => 'post.update']);
      Route::get('/post/delete/{id}', ['uses' => 'PostController@destroy', 'as' => 'post.delete']);
    });
  });

});
