@extends('home')

@section('content')
<body>
      <table class="table">
       <thead>
        <tr>
            <th>#</th>
            <th>Describe</th>
            <th>Location</th>
            <th>Status</th>
            
        </tr>
        </thead>
     <tbody>

    {!! Form::open(['route'=>'search.index','method'=>'GET','class'=>'Class_name'])!!}
     <div class="form-group col-md-3">
   {!! Form::hidden('search', 'status') !!}
   {!! Form::label('search', 'สถานะ') !!}
   {!! Form::select('status',['wait'=>'รอการดำเนินการ','operating'=>'กำลังดำเนินการ','rating'=>'รอการประเมิน','finished'=>'เสร็จสิ้น','cancel'=>'ยกเลิก','all'=>'ทั้งหมด'],'wait',['class'=>'form-control']) !!}
   </div>  
    <br>
   <div class="form-group col-md-1">
   {!! Form::submit('ค้นหา',['class' => 'btn btn-primary']); !!}
   {!! Form::close()!!}
    </div>
     @if($notifies)
     
	@foreach($notifies as $notify)
            <tr>
                <td>
                 <a href="/../notify/{{ $notify->id }}">    
                       {{ $notify->id }}
                  </a></td>
                <td>{{ $notify->describe }}</td>
                <td>{{ $notify->location }}</td>
                <td>@if($notify->status=='wait')
                           <span class="label label-primary">รอการดำเนินการ</span>
                        @elseif($notify->status=='finished')
                           <span class="label label-success"> เสร็จสิ้น</span>
                        @elseif($notify->status=='cancel')
                            <span class="label label-danger">ยกเลิก</span>
                        @elseif($notify->status=='operating')    
                            <span class="label label-warning">กำลังดำเนินการ</span>
                        @elseif($notify->status=='rating')    
                            <span class="label label-info">รอการประเมิน</span>
                        @endif  </td>
                <td>
                @if($notify->status=='wait')
                  <a href="/../job/{{$notify->id}}/edit"  class="btn btn-primary btn-block">รับงาน</a>
                @elseif($notify->status=='operating')
                  <a href="/../job/{{$notify->id}}/edit"  class="btn btn-primary btn-block">เปลี่ยนสถานะงานซ่อม</a>
                @elseif($notify->status=='finished')
                  <a class="btn btn-primary btn-block" href="{{ URL::route('rating.show', $notify->rate_id) }}">ผลการประเมิน</a>
                @endif

                </td>


            </tr>
        @endforeach
        
        @endif
     </tbody>
     </table>
	 
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
@stop
