<?php

namespace tsc\Http\Controllers\Auth;

use tsc\User;
use tsc\informer;
use tsc\tech;
use Validator;
use tsc\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
            return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'user_type'=>'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'typ_use' => $data['user_type'],

        ]);

       $user=User::where('name','LIKE',$data['name'])->first();

       
        if($data['user_type']=='2')
        {
          
             $informer=new informer;  
             $informer->id=$user->id;           
             $informer->name=$data['name'];
             $informer->save();
           

        }
        else if($data['user_type']=='3')
        {
          
            $tech= new tech;
            $tech->id=$user->id;
            $tech->name=$data['name'];
            $tech->department_id=$data['department_id'];
            $tech->save();
        }

        return $user;
    
}
}
