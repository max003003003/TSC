<?php namespace App\Http\Controllers;
use Auth;

class HomeController extends Controller {

	
	//protected $mailer;
	public function __construct()
	{
		//$this->middleware('guest');

		$this->middleware('auth', ['only' => 'logged']);
		//$this->mailer = $mailer;

	}

	public function index()
	{
		if(!Auth::guest()){
			if(Auth::user()->hasRole('captain'))
				return redirect('jobdep');
		    else if(Auth::user()->hasRole('technician'))
		    	return redirect('job');
		    else	
		 		return view('home',["user"=>Auth::user()]);
		 }
		else 
			return redirect('auth/login');
	}

}