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


class HistoryController extends Controller
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
    public function index(Request $request)
    {           
         $notifies =\App\Notify::all()->reverse();
        if($request->input('search')=='all')
        {  
               
        return view('history/history',['notifies'=>$notifies,'department'=>$this->department ,'user'=>$this->auth->user()])->withInput($request);

        }
        else if($request->input('search')=='name')
        {
             $id=\App\Profile::where('name','LIKE',$request->input('nameinput'))->first();
             
             if(!empty($id)){
                  
                  //$notifies=DB::select('SELECT * FROM notifies WHERE user_id = '.$id->user_id.' ORDER BY id DESC ');
                $notifies=\App\Notify::where('user_id','=',$id->user_id)->get()->reverse();
             }
             else {
                   
                    return View('history/history',['notifies'=>NULL,'department'=>$this->department,'user'=>$this->auth->user() ])->withInput($request);

             }
        }
        else if($request->input('search')=='department')
        {

            $notify=\App\Notify::where('department_id','=',$request->input('department_id'))->get()->reverse();

           /* $notify=DB::select('SELECT *
                                FROM notifies
                                INNER JOIN department_notify
                                ON notifies.department_id = department_notify.department_id
                                AND notifies.id=department_notify.notify_id
                                WHERE notifies.department_id='.$request->input('department_id').' ORDER BY id DESC;'); */
        
        return view('history/history',['notifies'=>$notify,'department'=>$this->department ,'user'=>$this->auth->user()])->withInput($request);

        }
        else if($request->input('search')=='status')
        {

                $notifies=\App\Notify::where('status','=',$request->input('status'))->get();
                $notifies=$notifies->reverse();


        return view('history/history',['notifies'=>$notifies,'department'=>$this->department,'user'=>$this->auth->user() ])->withInput($request); 

     
        }
         
        return view('history/history',['notifies'=>$notifies,'department'=>$this->department ,'user'=>$this->auth->user()])->withInput($request); 


}
    public function jobdep(Request $request)
    {           
        $notifies =\App\Notify::all()->reverse();
        $notifies=\App\Notify::where('status','=',$request->input('status'))->get();
        $notifies=$notifies->reverse();


        return view('jobdep/jobdep',['notifies'=>$notifies,'department'=>$this->department,'user'=>$this->auth->user() ])->withInput($request); 

     
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
    public function sss( )
    {

        return "kdk  fdj";
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "hell".$id;
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
        return "hell".$id;
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
