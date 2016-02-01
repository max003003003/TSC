<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Repositories\NotifyRepository as Notify;
use App\Repositories\Criteria\Notify\Notifywithuser;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use App\Department;
use App\Notify as Noti;
use DB;

class SearchController extends Controller {
    private  $notifies;
    private  $auth;
    private  $department;

    public function __construct(Notify $notify,Guard $auth)
     {
             $this->auth=$auth;
             $this->notifies = $notify;
             $this->department=Department::lists('name','id')->all();  
      }

     public function index(Request $request)
    {           
        $notifies =\App\Notify::all()->reverse();
        if($request->input('status')=='all'){
            $notifies=\App\Notify::where('department_id','=',$this->auth->user()->profile()->first()->department_id)
                                ->get();
        }
        else{
        $notifies=\App\Notify::where('status','=',$request->input('status'))
        ->where('department_id','=',$this->auth->user()->profile()->first()->department_id)
        ->get();
        }
        $notifies=$notifies->reverse();


        return view('jobdep/jobdep',['notifies'=>$notifies,'department'=>$this->department,'user'=>$this->auth->user() ])->withInput($request); 

     
    }
}
