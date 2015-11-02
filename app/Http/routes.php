<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Route::resource('history','historyController');





Route::group(['prefix' => 'notify'], function() {

  

      Route::group(['middleware' => 'informer'], function(){
        Route::resource('/', 'NotifyController');
        Route::resource('history','historyController');
        Route::get('auth/logout', 'Auth\AuthController@getLogout');
       
    });
});



Route::get('home',function(){

    if(Auth::guest())
		{
			return Redirect::to('auth/login');
		}
		else {
			return 'hellow';
		}

});

Route::get('/', function () {
    return Redirect::to('auth/login');
});
