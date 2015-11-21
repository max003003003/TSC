<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as User;
 use App\Repositories\RoleRepository as Role;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

         
        $department=Department::all();

        return  View('department/index',["department"=>$department ]);       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('department/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        Department::create([
            'name'=>$request->input('name')

            ]);
        return redirect('department');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return View('department/edit',['department'=>$department]);
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
       $department=Department::find($id);
       $department->name=$request->input('name');
       $department->save();
       return redirect('/department');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $de=Department::find($id); 
          $de->delete();
          return redirect('department');
    }
}
