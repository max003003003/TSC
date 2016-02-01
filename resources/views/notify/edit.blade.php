@extends('home')
<!-- app2 -->
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if($user->hasRole('user') )
      {!! Form::model($notify, array('route' => array('notify.update', $notify->id), 'method' => 'PUT')) !!}
     <div class="form-group">
        {!! Form::hidden('status', 'wait') !!}

         {!! Form::label('user_id', 'ID') !!}
         {!! Form::text('user_id',$user->id , ['class' => 'form-control','readonly' => 'readonly']) !!}
         <label >แผนก</label>       
        {!! Form::select('department_id', $department, Input::old('department_id'))  !!} 

   
    </div>
    <div class="form-group">
        {!! Form::label('describe', 'รายละเอียด') !!}
        {!! Form::textarea('describe',$notify->describe, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('location', 'สถานที่') !!}
         {!! Form::select('location', $location, Input::old('location'))  !!} 
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    
    @elseif($user->hasRole('technician')||$user->hasRole('admin'))
         {!! Form::model($notify, array('route' => array('notify.update', $notify->id), 'method' => 'PUT')) !!}
      <div class="form-group">
        {!! Form::hidden('status', 'wait') !!}

         {!! Form::label('user_id', 'ID') !!}
         {!! Form::text('user_id',$user->id , ['class' => 'form-control','readonly' => 'readonly']) !!}
         @if($notify->status=="operating"&&$user->hasRole("admin"))
                   <label >แผนก</label>
       
           {!! Form::select('department_id', $department, Input::old('department_id'))  !!} 

         @else
         <label >แผนก</label>       
        
         {!! Form::text('department_id',$notify->department()->first()->name, ['class' => 'form-control','readonly' => 'readonly']) !!}


         @endif





   
    </div>
    <div class="form-group">
        {!! Form::label('describe', 'รายละเอียด') !!}
        {!! Form::textarea('describe',$notify->describe, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('location', 'สถานที่') !!}
        {!! Form::text('location',$notify->location, ['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>
     
    <div class="form-group">
        {!! Form::label('comment', 'หมายเหตุ') !!}
        {!! Form::textarea('comment',$notify->comment, ['class' => 'form-control','readonly'=>'readonly']) !!}
    </div>
    




     
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary','readonly' => 'readonly']) !!}
    </div>

    {!! Form::close() !!}
    @endif
@endsection