
 @extends('notify.notifymaster')
@section('linkcreate')
      <li><a href="../notify/create">แจ้งซ่อม</a></li>  
@endsection
@section('content2')      
     
    <div class="container-fluid">
      <div class="row">
       
        <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main">
        <!-- <h1 class="page-header">ผลการแจ้งซ่อม</h1> -->
                  @if($notify->status =='รอดำเนินการ')  
                     <div class="panel panel-danger"> 
                  @elseif($notify->status =='กำลังดำเนินการ')  
                     <div class="panel panel-primary"> 
                  @elseif($notify->status =='ดำเนินการสำเร็จ')  
                     <div class="panel panel-secces"> 
                  @endif





                      <div class="panel-heading">
                       <h3 class="panel-title">รหัสการแจ้งซ่อม:  {{$notify->id}}
                       <div class="btn-group pull-right" >

                         @if($notify->status =='รอดำเนินการ')
                        <a class="btn btn-warning" 
                        href={!! URL::to('notify/' . $notify->id. '/edit' )!!} >แก้ไข </a>
                        @endif                    

                      </div>
                      </h3>
                       <div class="clearfix"> </div>
                      
                      </div>

                      <div class="panel-body">
                
                     
                     <h3>  สถานะ : {{$notify->status}}</h3>
                   
                     <h3>  ชื่อผู้แจ้ง : {{$informer->name}}</h3>
                     @if($notify->tech)
                      <h3>  ช่างผู้รับงาน : {{$notify->tech->name}}</h3>
                     @endif
                     <h3>  รายละเอียด : {{$notify->describe}}</h3>   
                     <h3>  สถานที่ : {{$notify->location}}</h3> 
                     <h3>  เวลาที่แจ้ง : {{ date('F j, Y, g:i a', strtotime($notify->created_at)) }} </h3> 
                     <h3>  เวลาที่แก้ไขล่าสุด :{{ date('F j, Y, g:i a', strtotime($notify->updated_at)) }}</h3> 
                        {!! Form::open(array('url' => 'notify/' . $notify->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('ยกเลิกใบแจ้งซ่อม', array('class' => 'btn btn-danger ')) !!}
                      {!! Form::close() !!}
                   
                     
                    </div>
                  </div>                   

          </div>
        </div>
      </div>
    </div>

@endsection   