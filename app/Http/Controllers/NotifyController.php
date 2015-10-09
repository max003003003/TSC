<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotifyController extends Controller
{
    public function getIndex()
    {
      return 'this index ';
    }
   public function getAdd()
   {
     return View('notify/hello');
   }
    public function getHistory()
    {
      return 'history';
    }
    public function postProcess()
    {
      return 'this form was successfully post';
    }
}
