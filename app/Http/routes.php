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


Route::get('/', 'HomeController@index');


Route::get('/dashboard', [
	'as' => 'dashboard',
	'uses' => 'DashboardController@index',
	'middleware' => 'auth'
]); 


Route::group(['middleware' => ['auth', 'authorize']], function(){
    Route::resource('job','JobController');
    Route::resource('rate','RatingController');
    Route::resource('job','JobController');
    Route::resource('history','HistoryController');
	Route::resource('users', 'UsersController');
	Route::resource('profile', 'ProfileController');
	Route::resource('department','DepartmentController');
	Route::resource('roles', 'RolesController');
	Route::resource('notify','NotifyController');	
	Route::resource('permissions', 'PermissionsController');
	Route::get('/role_permission', 'RolesPermissionsController@index');
	Route::post('/role_permission', 'RolesPermissionsController@store');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
