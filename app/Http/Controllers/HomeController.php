<?php

namespace tsc\Http\Controllers;

use Illuminate\Http\Request;
use tsc\Http\Requests;
use tsc\Http\Controllers\Controller;
use tsc\Http\Controllers\UserController;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use Hash;

 

use tsc\User;
class HomeController extends Controller
{

    public function showLogin()
    {
    
    	return View('login/login');
    }
    public function doLogin()
    {
    	$rules = array(
		    'email'    => 'required|email',  
		    'password' => 'required|min:4' 
		);

 
		$validator = Validator::make(Input::all(), $rules);
 
	if ($validator->fails()) {
    return redirect('login')
        ->withErrors($validator)  
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {

     
   $input=Input::all();
   
   $attempt=Auth::attempt([
   		'email'=> $input['email'],
   		'password'=>$input['password'],
   	]);
       
       dd($input['email']);
     
     
    if ($attempt) {

        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
       return  redirect('wellcome/'.$input['email']);

    } else {        
          
        // validation not successful, send back to form 
        return redirect('login');

    }

}
    	 
    }
   
    public function getIndex()
    {
      return  redirect('login');

    }
    public function getWellcome($email)
    {
    	 
    	return View('login/wellcome')->with($email);
    }
    public function doLogout()
    {

    	Auth::logout();
    	return redirect('login');
    }
    

}
