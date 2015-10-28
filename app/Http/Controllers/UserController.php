<?php

namespace tsc\Http\Controllers;

use Illuminate\Http\Request;

use tsc\Http\Requests;
use tsc\Http\Controllers\Controller;
use tsc\User;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('login/users')->withUsers(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('login/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules = array(
          'name' =>'required|unique:users',
          'password'=> 'required|min:6',
          'password-repeat'=>'required|same:password',
          'email' => 'required|email|unique:users'
      );



      $validator = \Validator::make(input::all() , $rules);
        if ($validator->fails()){
        return redirect('users/create')
            ->withInput()
            ->withErrors( $validator->messages());
          }

        User::create(array(
            'name' => Input::get('name'),
            'email'=>Input::get('email'),
            'password'=>Hash::make(Input::get('password'))

        ));

        return redirect('users');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
