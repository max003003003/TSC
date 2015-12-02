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
    
    
      {!! Form::model($notify, array('route' => array('job.update', $notify->id), 'method' => 'PUT')) !!}
     <div class="form-group">
        {!! Form::hidden('status', 'waite') !!}

         {!! Form::label('user_id', 'ID') !!}
         {!! Form::text('user_id',$user->id , ['class' => 'form-control','disabled' => 'disabled']) !!}

         <label >แผนก</label>
       
           {!! Form::text('department_id', $notify->department()->first()->name, ['class' => 'form-control','disabled' => 'disabled'] )  !!} 

   
    </div>
    <div class="form-group">
        {!! Form::label('describe', 'รายละเอียด') !!}
        {!! Form::textarea('describe',$notify->describe, ['class' => 'form-control','disabled' => 'disabled']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('location', 'สถานที่') !!}
        {!! Form::text('location',$notify->location, ['class' => 'form-control','disabled' => 'disabled']) !!}
    </div>
    <div>
        
        <label >มอบหมายงาน</label>
         @foreach($tech as $t)         

            <?php $checked =  $t->id ; ?>
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('tech[]', $t->user_id, $checked) !!} {{ $t->name }}
                    </label>
                </div>
        @endforeach
    </div>


    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection