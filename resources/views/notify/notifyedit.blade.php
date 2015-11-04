@extends('notify.notifymaster')
@section('title')
  edit
@endsection

@section('content2')
			
		 
    <div class="container-fluid">
      <div class="row">
          
          {!! Form::model($notify, array('route' => array('notify.update', $notify->id), 'method' => 'PUT')) !!}
         
          {!! Html::ul($errors->all()) !!}
          <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">แก้ไข</h1>
    		<div class="form-group">
    		<label for="exampleInputEmail1">รหัสประจำตัว {{$userid}}</label>
           </div>
           	<div class="form-group">
           	<label for="exampleInputEmail1">แผนก</label>
    		    {!! Form::select('department', $department,$notify->department_id) !!}      
           	


           <div class="form-group">
				{!! Form::label('รายละเอียด') !!}
				{!! Form::textarea('description', $notify->describe,
                array('required', 'class'=>'form-control',
					'placeholder'=>'โปรดระบุรายละเอียด')) !!}
			</div>	
			<div class="form-group">
				{!! Form::label('สถานที่') !!}
				{!! Form::text('location', $notify->location,
                array('required', 'class'=>'form-control',
					'placeholder'=>'โปรดระบุสถานที่')) !!}
		
             
				@section('scripts')  
				    {!!Html::script('js/scrip.js')!!}
				@endsection
      

			</div>			
          <div class="form-group">
          <button class="btn  btn-primary " type="submit">ยืนยันการแก้ไข</button>
          </div>

          </div>
        </div>
      </div>
      </form>
      </div>
    

   

@endsection