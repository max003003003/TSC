
@extends('home')

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

         {!! Form::label('user_id', 'หมายเลขผู้ใช้') !!}
         {!! Form::text('user_id',$user->id , ['class' => 'form-control','readonly'=>'readonly']) !!}

        <label >แผนก</label>
          {!! Form::select('department_id', $department) !!} 
    </div>
    <div class="form-group">
        {!! Form::label('describe', 'รายละเอียด') !!}
        {!! Form::textarea('describe',null, ['class' => 'form-control']) !!}
    </div>

      <div class="form-group">
            <label >สถานที่</label>
          {!! Form::select('location', $location) !!} 
         
    </div>
    <div class="form-group">
        {!! Form::submit('สร้างใบแจ้งซ่อม', ['class' => 'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}
    
@endsection