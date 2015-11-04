<?php

namespace tsc\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use tsc\User;
use tsc\Notify;
use tsc\Department;

use tsc\Http\Requests;

use tsc\Http\Controllers\Controller;

class NotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userid;
    public function index()
    {
        

         $notify=Notify::where('infomer_id','=',Auth::User()->id)
                ->where('status','LIKE','รอดำเนินการ')
                ->first();
        

        
        return View('notify/notifyhome',['notify'=>$notify]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid=Auth::User()->id;
        $department=Department::lists('name','id')->all();  
        $tech=User::lists('name','id')->all(); 
            

        return View('notify/notifycreate',['userid'=>$userid,'department'=>$department,'techs'=>$tech]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $location=$request->input('location');
        $descrip=$request->input('description');
        $department_id=$request->input('department');

        Notify::create([
            'describe'=>$descrip,
            'location'=>$location,
            'department_id'=>$department_id,
            'status'=>'รอดำเนินการ',
            'infomer_id'=>Auth::User()->id
            ]);
       return $this->index();
        
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
