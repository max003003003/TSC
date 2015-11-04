<?php

namespace tsc\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use tsc\User;
use tsc\Notify;
use tsc\Department;
use tsc\informer;
use  Validator;
use Redirect;
use tsc\tech;
use tsc\Http\Requests;
use tsc\Http\Controllers\Controller;

class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     

   

    public function index()
    {   
                
          $technician=tech::where('id','=',Auth::User()->id)
                ->first();                
          $departmentID=$technician->department_id;
          $notify=Notify::where('department_id','=',$departmentID)
                ->where('tech_id','=',NULL) 
                ->get();
                  
        
        return View('tech/techhome',['notifies'=>$notify]);

   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
         $notify=Notify::findOrFail($id);      
              

         $informer=informer::findOrFail($notify->infomer_id)->first();
         
         return View('tech/techshow',['notify'=>$notify,'informer'=>$informer]);
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
         $department=Department::find(Auth::User()->id)->first();
         $departmentName=$department->name;

         $userid=Auth::User()->id;

        return View('tech/techedit',['departmentName'=>$departmentName,'notify'=>$notify,'department'=>$department,'userid'=>$userid]);
   
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
          
            
            $notify=Notify::find($id);   

            $notify->status = "กำลังดำเนินการ";            
            
            $notify->tech_id = Auth::User()->id;
            
            
            $notify->save();
                
            $request->session()->flash('message', 'Successfully update');
            return Redirect::to('tech');
        
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
