@extends('notifyhome')
@section('content2')
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
@endsection