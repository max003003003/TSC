<?php

 Route::get('/', 'HomeController@showWelcome');

 Route::resource('notify','NotifyController');


 Route::resource('recipes','RecipeController');
