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

class formcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          return "hdk";
           $notify=Notify::find($id);   

            $notify->status = $request->input('status');            
            
            $notify->status = $request->input('comment');
                       
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
