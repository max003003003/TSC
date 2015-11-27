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
class NotifyController extends Controller
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

    public function index() {
       $notifies=\App\Notify::where('user_id','=',$this->auth->user()->id)
                ->where('status','=','wait')
                ->get();  
        return View('notify/notify',['notifies'=>$notifies]);
     
  }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
        return View('notify/create',['department'=>$this->department,'user'=>$this->auth->user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, array('user_id'=>'required','describe' => 'required', 'department_id' => 'required', 'location' => 'required'));
       
       

       $notify = $this->notifies->create($request->all());
       $rating= \App\Rate::create();
       $notify->rate_id=$rating->id;
       $notify->save();


        Flash::success('Notify successfully created');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notify=$this->notifies->find($id);    
        return \Response::json($notify);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $notify=Noti::find($id);
        return view('notify/edit',['notify'=>$notify,'department'=>$this->department,'user'=>$this->auth->user()]);

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

        $this->validate($request, array('user_id'=>'required','describe' => 'required', 'department_id' => 'required', 'location' => 'required'));
        $notify=$this->notifies->find($id);        

        $notify->update($request->all());


        Flash::success('Notify successfully Update');

        return redirect('/notify');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notify=$this->notifies->find($id);        
        $notify->status="cancel";
        $notify->update();


        Flash::success('Notify successfully Update');

        return redirect('/notify');
    }
}
