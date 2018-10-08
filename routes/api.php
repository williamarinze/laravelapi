<?php

use Illuminate\Http\Request;

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

// protected routes
Route::group(['middleware' => ['api', 'auth']], function () {
  Route::group(['prefix' => 'auth'], function (){
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('changepassword','ChangePasswordController@changePassword');
  });

   Route::resource('users','UserController');
   Route::resource('posts','PostController', ['except' => ['index', 'show']]);
   Route::resource('comments', 'CommentController', ['except' => 'index']);
});


// public routes
Route::group(['middleware' => 'api'], function ($router) {
  Route::post('auth/login', 'AuthController@login');
  Route::post('register', 'UserController@store');

  Route::get('posts', 'PostController@index');
  Route::get('posts/{id}', 'PostController@show');
  Route::get('users/{id}/posts', 'UserController@posts');
});
