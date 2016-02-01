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
      
    private  $user,$auth; 
     
    public function __construct(User $user,Guard $auth )
    {    
        $this->auth=$auth;
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
        
        $profile=Profile::find($id);
         
        $department=\App\Department::lists('name','id')->all(); 

        return view("profile/edit",['user'=>
        $this->auth->user(),"profile"=>$profile,'department'=>$department]);
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
        $profile=Profile::find($id);
        $profile->name=$request->input('name');
        $profile->tel=$request->input('tel');
        $profile->department_id=$request->input('department_id');
        $profile->save();
       return redirect('/profile');
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
