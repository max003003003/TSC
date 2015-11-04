@extends('notify.notifymaster')
@section('title')
  create
@endsection
@section('linkcreate')
      <li><a href="">แจ้งซ่อม</a></li>  
@endsection
@section('content2')
			
		 
    <div class="container-fluid">
      <div class="row">
          <form method="POST" action="/notify">
          <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">แจ้งซ่อม</h1>
    		<div class="form-group">
    		<label for="exampleInputEmail1">รหัสประจำตัว {{$userid}}</label>
           </div>
           	<div class="form-group">
           	<label for="exampleInputEmail1">แผนก</label>
    		    {!! Form::select('department', $department) !!}      
           	


           <div class="form-group">
				{!! Form::label('รายละเอียด') !!}
				{!! Form::textarea('description', null,
                array('required', 'class'=>'form-control',
					'placeholder'=>'โปรดระบุรายละเอียด')) !!}
			</div>	
			<div class="form-group">
				{!! Form::label('สถานที่') !!}
				{!! Form::text('location', null,
                array('required', 'class'=>'form-control',
					'placeholder'=>'โปรดระบุสถานที่')) !!}
			
             
				@section('scripts')  
				    {!!Html::script('js/scrip.js')!!}
				@endsection
      

			</div>			
          <div class="form-group">
          <button class="btn  btn-primary " type="submit">ยืนยันการแจ้งซ่อม</button>
          </div>

          </div>
        </div>
      </div>
      </form>
      </div>
    

   

@endsection