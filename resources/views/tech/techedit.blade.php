@extends('notify.notifymaster')
@section('title')
  edit
@endsection

@section('content2')
			
		 
    <div class="container-fluid">
      <div class="row">
          
          {!! Form::model($notify, array('route' => array('job.update', $notify->id ), 'method' => 'PUT')) !!}
         
          {!! Html::ul($errors->all()) !!}
          <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
          <input name="op" type="hidden" value="1" />

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">แก้ไข</h1>
    		<div class="form-group">
    		<label for="exampleInputEmail1">รหัสประจำตัว : {{$userid}}</label>
           </div>
           	<div class="form-group">
           	<label for="exampleInputEmail1">แผนก : {{$departmentName}}</label>
    		 


           <div class="form-group">
				{!! Form::label('รายละเอียด : '.$notify->describe) !!}				
			</div>
       <div class="form-group">
            {!! Form::label('สถานที่ :'.$notify->location) !!}   
            </div> 	
        <div class="form-group">    
          {!! Form::select('status', array(
            'รอดำเนินการ' => 'รอดำเนินการ' ,
            'กำลังดำเนินการ' => 'กำลังดำเนินการ',
            'ดำเนินการเสร็จสิ้น' => 'ดำเนินการเสร็จสิ้น'
          ))!!}
          </div>
			<div class="form-group">
	        
				 
        {!! Form::label('ความคิดเห็น') !!}
        {!! Form::textarea('comment', NULL,
                array( 'class'=>'form-control',
          'placeholder'=>'ความคิดเห็น')) !!}
   
      </div>      
      
 
			</div>			
          <div class="form-group">
          <button class="btn  btn-primary " type="submit">ยืนยันการแก้ไข</button>
          </div>
        {!! Form::close() !!}
          </div>
        </div>
      </div>
      </form>
      </div>
    

   

@endsection