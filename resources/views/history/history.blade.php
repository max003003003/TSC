@extends('home')

@section('content')
<body>
   <?php $u = 1; ?>
@if(!$notifies)
    <script type="text/javascript">
      window.alert("ค้นหาไม่พบ");
    </script>
@endif
  {!! Form::open(['route'=>'history.index','method'=>'GET','class'=>'Class_name'])!!}

   <div class="form-group col-md-2">
   {!! Form::radio('search', 'all') !!}
   {!! Form::label('all','ทั้งหมด')!!}   
   </div>

 
   <div class="form-group col-md-3">    
   {!! Form::radio('search', 'department') !!} 
   {!! Form::label('search', 'แผนก') !!}
   {!! Form::select('department_id',$department,Input::old('department_id'),['class'=>'form-control']) !!} 
  </div>
 
   <div class="form-group col-md-3">
  {!! Form::radio('search', 'name') !!}
  {!! Form::label('search', 'ชื่อ') !!}
  {!! Form::text('nameinput',Input::old('nameinput'),['class'=>'form-control'] ) !!} 
  </div>  
  
   <div class="form-group col-md-3">
   {!! Form::radio('search', 'status') !!}
   {!! Form::label('search', 'สถานะ') !!}
   {!! Form::select('status',['wait'=>'รอการดำเนินการ','operating'=>'กำลังดำเนินการ','rating'=>'รอการประเมิน','finished'=>'เสร็จสิ้น'],'wait',['class'=>'form-control']) !!}
   </div>  
  <br>
   <div class="form-group col-md-1">
   {!! Form::submit('ค้นหา',['class' => 'btn btn-primary']); !!}
   {!! Form::close()!!}
 </div>

  @if($notifies)
      <table class="table">  
       <thead>
        <tr>
            <th>ลำดับ</th>
            <th>เลขใบแจ้งซ่อม</th>
            <th>รายละเอียด</th>
            <th>สถานที่</th>
            <th>สถานะ</th>
            <th>วันที่แจ้ง</th>                         
        </tr>
      </thead>
     <tbody>    
         @foreach($notifies as $notify)
               <tr> 
                     <td>
                        {{$u++}}
                     </td>                    
                        <td>
                          <a href="/../notify/{{ $notify->id }}">    
                               {{ $notify->id }}
                          </a>
                        </td>
                        <td width="35%">{{ $notify->describe }}</td>
                        <td>{{ $notify->location }}</td>
                        <td>
                        @if($notify->status=='wait')
                           <span class="label label-primary">รอการดำเนินการ</span>
                        @elseif($notify->status=='finished')
                           <span class="label label-success"> เสร็จสิ้น</span>
                        @elseif($notify->status=='cancel')
                            <span class="label label-danger">ยกเลิก</span>
                        @elseif($notify->status=='operating')    
                            <span class="label label-warning">กำลังดำเนินการ</span>
                        @elseif($notify->status=='rating')    
                            <span class="label label-info">รอการประเมิน</span>
                        @endif  
                        </td>
                        <td> {{ \App\Datethai::DateThai( $notify->created_at) }}
                        </td>                        
                        @if($notify->status=="operating" && $user->hasRole('admin'))
                            <td colspan="2"><a href="notify/{{$notify->id}}/edit" class="btn btn-warning btn-block">แก้ไข</a></td>
                        @else
                        <td></td>
                        @endif
                     </tr>                    
          @endforeach           
       </tbody>
     </table> 
  @endif
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
@stop
