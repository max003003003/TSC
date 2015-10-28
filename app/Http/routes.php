<?php

 Route::get('/','HomeController@getIndex');

Route::get('login', array('uses' => 'HomeController@showLogin'));

Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));
 

 Route::resource('users','UserController');


 Route::get('wellcome/{email}',function ($email)
{
	return View('login/wellcome')->with('email',$email);
});
 Route::resource('notify','NotifyController');


 Route::resource('recipes','RecipeController');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
 
Route::get('home',function(){
	if(Auth::guest())
		{
			return Redirect::to('auth/login');
		}
		else {
			return Redirect::to('notify');
		}
});
 

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');