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

Route::get('sendemail', function () {
        
    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message) {

        $message->from('tscwebmaster0@gmail.com', 'Learning Laravel');

        $message->to('max003003003@gmail.com')->subject('Learning Laravel test email');

    });
  
    return "Your email has been sent successfully";

});
Route::get('/', 'HomeController@index');


Route::get('/dashboard', [
	'as' => 'dashboard',
	'uses' => 'DashboardController@index',
	'middleware' => 'auth'
]); 


Route::group(['middleware' => ['auth', 'authorize']], function(){
    Route::get('owner','JobController@owner');
    Route::resource('job','JobController');
    Route::resource('rating','RatingController');
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
