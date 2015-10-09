<?php

namespace tsc\Http\Controllers;

use Illuminate\Http\Request;
use tsc\Http\Requests;
use tsc\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function showWelcome()
    {
      return  View ('notify/hello');

    }

}
