<?php

namespace tsc\Http\Controllers;

use Illuminate\Http\Request;
use tsc\Notify;
use tsc\Http\Requests;
use tsc\Http\Controllers\Controller;
use Redirect;
use Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notify=Notify::where('tech_id','=',Auth::User()->id)
                    ->where('status','LIKE','กำลังดำเนินการ')
                    ->get();
        $jobl=$notify->count();

        return View('tech/jobhome',['notifies'=>$notify,'jobl'=>$jobl]);

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
           if($request->input('op')=='1')
           {
            $notify=Notify::find($id);   

            $notify->status = $request->input('status');            
            
            $notify->comment = $request->input('comment');            
            
            $notify->save();
                
            $request->session()->flash('message', 'Successfully update');
            return Redirect::to('tech');
           }
           else {
               
           
           $notify=Notify::find($id);   

            $notify->status = "รอดำเนินการ";            
            
            $notify->tech_id = NULL;
            $notify->save();
                
            $request->session()->flash('message', 'Successfully update');
            return Redirect::to('tech');
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
        //
    }
}
