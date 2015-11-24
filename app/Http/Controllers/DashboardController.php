<?php namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\RedirectResponse;
class DashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
		$this->middleware('auth', ['only' => 'logged']);
	}

	public function index()
	{
		if(Auth::user()->hasRole('admin'))		
	      	return view('dashboard.index',["user"=>Auth::user()]);
		else 
			return new RedirectResponse(url('/'));
	}



}
