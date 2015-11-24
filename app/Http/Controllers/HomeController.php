<?php namespace App\Http\Controllers;
use Auth;

class HomeController extends Controller {

	public function __construct()
	{
		//$this->middleware('guest');
		$this->middleware('auth', ['only' => 'logged']);
	}

	public function index()
	{
		return view('home',["user"=>Auth::user()]);
	}

}