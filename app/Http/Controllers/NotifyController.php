<?php

namespace tsc\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use tsc\User;
use tsc\Notify;
use tsc\Department;
use tsc\informer;
use  Validator;
use tsc\Http\Requests;
use Redirect;
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
                ->get();

                
        
        return View('notify/notifyhome',['notifies'=>$notify]);

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
         $notify=Notify::findOrFail($id);
         $informer=informer::findOrFail($notify->infomer_id);
         
         return View('notify/notifyshow',['notify'=>$notify,'informer'=>$informer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
    	$notify=Notify::findOrFail($id);
    	 $department=Department::lists('name','id')->all();  
        $userid=Auth::User()->id;

        return View('notify/notifyedit',['notify'=>$notify,'department'=>$department,'userid'=>$userid]);
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
    		  $rules = array(
            'description'       => 'required',
            'location'      => 'required'
        );
     
      $validator = Validator::make($request->all(), $rules);

      
        if ($validator->fails()) {
            return Redirect::to('notify/' . $id . '/edit')
                ->withErrors($validator);
               
        } else {
            // store
            $nerd = Notify::find($id);
            $nerd->describe     = $request->input('description');
            $nerd->location      =$request->input('location');
            $nerd->department_id = $request->input('department');
            $nerd->save();

            // redirect
            $request->session()->flash('message', 'Successfully update');
            return Redirect::to('notify');
        }
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$notify=Notify::find($id);
    	$notify->status="ผู้แจ้งยกเลิก";
    	$notify->save();
      
      return Redirect::to('/notify');
    }
}
