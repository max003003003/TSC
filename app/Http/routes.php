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
use \App\Email\mail;
Route::get('info', function () {
  phpinfo();
});

/*
Route::get('sendemail', function () {  
  $mail = new mail();
  return $mail->sendEmail('max003003003@gmail.com','vorabhol');
});
*/

Route::get('/', 'HomeController@index');

 


Route::get('/dashboard', [
	'as' => 'dashboard',
	'uses' => 'DashboardController@index',
	'middleware' => 'auth'
]); 

Route::post('his',function($id)
{
   return "helel";
 
});
 Route::post('/his', ['uses' => 'HistoryController@sss', 'as' => 'history.sss']);

Route::group(['middleware' => ['auth', 'authorize']], function(){   
     Route::resource('location','LocationController');
    Route::get('owner','JobController@owner'); 
    Route::get('editJobStatus','JobController@editStatusJob');    
    Route::resource('job','JobController');
    Route::resource('rating','RatingController');
    Route::resource('showrate','RatingController@showrate');
    Route::resource('job','JobController');
    Route::resource('jobdep','NotifyController@showdep');
    Route::resource('history','HistoryController');
	Route::resource('users', 'UsersController');
	Route::resource('profile', 'ProfileController');
	Route::resource('department','DepartmentController');
	Route::resource('roles', 'RolesController');
	Route::resource('notify','NotifyController');
  Route::resource('search', 'SearchController');
  Route::resource('queries', 'QueryController');
	Route::resource('permissions', 'PermissionsController');
	Route::get('/role_permission', 'RolesPermissionsController@index');
	Route::post('/role_permission', 'RolesPermissionsController@store');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
