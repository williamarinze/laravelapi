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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Auth
               Route::group(['middleware' => 'auth:api'], function() {

                  Route::post('register', 'Auth\RegisterController@register');
                  Route::post('forgotpassword', 'Auth\ForgotPasswordController@forgotpassword');

                  Route::post('verification', 'Auth\VerificationController@verification');

                  Route::post('login', 'Auth\LoginController@login');
                  Route::post('logout', 'Auth\LoginController@logout');
                  Route::post('resetpassword', 'Auth\LoginController@reset');
                                               
                                                });

//posts
       Route::resource('posts','PostController');
//comments       
       Route::resource('comments','CommentController');
//users       
       Route::resource('users','UserController');
