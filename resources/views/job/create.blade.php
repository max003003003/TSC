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
    
    {!! Form::open(['route' => 'notify.store']) !!}

     <div class="form-group">
        {!! Form::hidden('status', 'wait') !!}

         {!! Form::label('user_id', 'ID') !!}
         {!! Form::text('user_id',$user->id , ['class' => 'form-control']) !!}

        <label >แผนก</label>
          {!! Form::select('department_id', $department) !!} 
    </div>
    <div class="form-group">
        {!! Form::label('describe', 'รายละเอียด') !!}
        {!! Form::textarea('describe',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('location', 'สถานที่') !!}
        {!! Form::text('location',null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection