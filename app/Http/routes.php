<?php

 Route::get('/', 'HomeController@showWelcome');

 Route::controller('notify','NotifyController');
