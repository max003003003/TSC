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
use Gate;
use App\Email\mail;
use App\Location;
use DB;
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
    private  $location;

    public function __construct(Notify $notify,Guard $auth)
     {
             $this->auth=$auth;
             $this->notifies = $notify;
             $this->department=Department::lists('name','id')->all();
             $this->location=Location::lists('name','name')->all();  
      }

    public function index() {
       $notifies=\App\Notify::where('user_id','=',$this->auth->user()->id)
                ->where('status','=','wait')
                ->get(); 
        $notifies=$notifies->reverse();
        return View('notify/notify',['notifies'=>$notifies]);
     
  }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
        return View('notify/create',['department'=>$this->department,'user'=>$this->auth->user(),'location'=>$this->location]);
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
        $department=Department::find($request->input('department_id'));
        $notify->department()->save($department);
        $rating= \App\Rate::create();
        $rating->notify_id=$notify->id;
        $rating->save();
        $notify->rate_id=$rating->id;
        $notify->save();        

       $captain=DB::select("select users.id from users where users.id in (select profiles.user_id from profiles where user_id In (select role_user.user_id from roles,role_user where roles.id = role_user.role_id and roles.name='captain'))");         
       foreach ($captain as $cap) 
       {             
        $user=\App\User::find($cap->id);
        if($user->profile()->first()->department_id==$notify->department_id){
            $mail=new mail();
            $message="มีงานแจ้งซ่อมใหม่เข้ามาในแผนก".$notify->department()->first()->name."เข้าดูได้ที่ http://onestone.eng.src.ku.ac.th:8002"; 
            $name="".$user->profile()->first()->name;             
            $mail->sendEmail($user->email,$name,$message);
        }
      }
      
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

        $notify=\App\Notify::find($id);  
        $user2=\App\user::find($notify->user_id);
        return view('notify.show',['notify'=>$notify ,'user'=>$user2]);

    }
    public function showdep()
    {   
        $notifies=\App\Notify::where('status','=','wait')
                    ->where('department_id','=',$this->auth->user()->profile()->first()->department_id)                   
                    ->get();
        $notifies=$notifies->reverse();


        return View('jobdep/jobdep',['notifies'=>$notifies]);
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

        if (Gate::denies('update', $notify)) 
        {
                    abort(503);
        }
         
        return view('notify.edit',['notify'=>$notify,'department'=>$this->department,'user'=>$this->auth->user(),'location'=>$this->location]);

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

         $notify=Noti::find($id);
        
        if($request->input('statusN')!=NULL)
        {     
                $notify->status='rating';
                $notify->save();
                $user=\App\User::find($notify->user_id);
                $mail=new mail();
                $message="งานซ่อมของคุณเสร็จเรียบร้อยแล้วกรุณาเข้าระบบเพื่อประเมิน ที่ http://onestone.eng.src.ku.ac.th:8002/rating";
                $mail->sendEmail($user->email,$user->profile()->first()->name,$message);
                return redirect('/');
        }
       
        if (Gate::denies('update', $notify))
        {
            abort(403);
        }


        $this->validate($request, array('user_id'=>'required','describe' => 'required', 'department_id' => 'required', 'location' => 'required'));
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
        $notify=$this->notifies->find($id);        
        $notify->status="cancel";
        $notify->update();


        Flash::success('Notify successfully Update');

        return redirect('/notify');
    }
}
