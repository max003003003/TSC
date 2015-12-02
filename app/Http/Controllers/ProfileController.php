<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
 use App\Repositories\Criteria\User\UsersWithRoles;
use Illuminate\Contracts\Auth\Guard;
use App\Profile;
use App\Repositories\UserRepository as User; 
use Laracasts\Flash\Flash;
use Gate;


class ProfileController extends Controller
{
      
    private  $user; 
     
    public function __construct(User $user )
    {
        $this->user = $user;
         
    }  
    
    public function index()
    {
        $profile=Profile::all();
        return view('profile.index', compact('profile','user'));
    }

    public function create()
    {
       // return "hello create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $profile=Profile::find($id);
        return view("profile.show",["profile"=>$profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile=Profile::find($id)->first();
      
        return View("profile.edit",["profile"=>$profile]);
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
