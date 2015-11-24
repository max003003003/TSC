<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Repositories\NotifyRepository as Notify;
use App\Repositories\Criteria\Notify\Notifywithuser;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use App\Department;
use App\Notify as Noti;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private  $notifies;
    private  $auth;
    private  $department;


    public function __construct(Notify $notify,Guard $auth)
     {
             $this->auth=$auth;
             $this->notifies = $notify;
             $this->department=Department::lists('name','id')->all();

      }





    public function index()
    {
         

          $notifies=\App\Notify::where('department_id','=',$this->auth->user()->profile()->first()->department_id)
                ->where('status','=','wait')
                ->get();  
                
        return View('job/job',['notifies'=>$notifies,'user'=>$this->auth->user()]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $notify=$this->notifies->find($id);        

        $notify->update($request->all());

        Flash::success('Notify successfully Update');

        return redirect('/');
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
