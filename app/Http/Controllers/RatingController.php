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
use App\Rate;
 
use Validator;
class RatingController extends Controller
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
        $notifies=\App\Notify::where('status','=','rating')                   
                    ->get();


        return View('rating/rating',['notifies'=>$notifies]);
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

         $rate=Rate::find($id);
         
         return view('rating/edit',['rate'=>$rate]);
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
 

            $validator = Validator::make($request->all(), [
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('rating/'.$id.'/edit/')
                        ->withErrors($validator)
                        ->withInput();
        }

        $rate=Rate::find($id)->first();
        $rate->a=$request->input('1');
        $rate->b=$request->input('2');
        $rate->c=$request->input('3');
        $rate->d=$request->input('4');
        $rate->e=$request->input('5');
        $rate->comment=$request->input('comment');
        $rate->save();

         $notifies=\App\Notify::where('rate_id','=',$id)                   
                    ->first();

         $notifies->status='finished';
         $notifies->save();
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
