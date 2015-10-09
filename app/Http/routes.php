<?php

 Route::get('/', 'HomeController@showWelcome');

 Route::controller('notify','NotifyController');

 Route::resource('recipes','RecipeController');
 /*Route::get('/', function()
 {
   $a='jdhl';
   $b='ieood';
   $notify =new app::Notify();
   return  $notify->dumpInfo();
 }); */
