@extends('app2')

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
    
    
      {!! Form::model($notify, array('route' => array('notify.update', $notify->id), 'method' => 'PUT')) !!}
     <div class="form-group">
        {!! Form::hidden('status', 'wait') !!}

         {!! Form::label('user_id', 'ID') !!}
         {!! Form::text('user_id',$user->id , ['class' => 'form-control']) !!}

         <label >แผนก</label>
       
           {!! Form::select('department_id', $department, Input::old('department_id'))  !!} 

   
    </div>
    <div class="form-group">
        {!! Form::label('describe', 'รายละเอียด') !!}
        {!! Form::textarea('describe',$notify->describe, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('location', 'สถานที่') !!}
        {!! Form::text('location',$notify->location, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection