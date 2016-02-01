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
    
    
      {!! Form::model($notify, array('route' => array('job.update', $notify->id), 'method' => 'PUT')) !!}
     <div class="form-group">
        

         {!! Form::label('user_id', 'ID') !!}
         {!! Form::text('user_id',$user->id , ['class' => 'form-control','readonly' => 'readonly']) !!}
         @if($user->hasRole('admin'))
             <label >แผนก</label>       
           {!! Form::select('department_id', $department, Input::old('department_id'))  !!} 

         @else

         <label>แผนก</label>
       
           {!! Form::text('department_id', $notify->department()->first()->name, ['class' => 'form-control','readonly' => 'readonly'] )  !!} 
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
        {!! Form::text('comment',NULL, ['class' => 'form-control']) !!}
    </div>
    <div>
        
     @if($user->hasRole('captain')&&$user->hasRole('technician'))    
        <label >มอบหมายงาน</label>
         @foreach($tech as $t)    
            <?php $checked =  $t->id ; ?>
                <div class="checkbox">
                  <label>
                    {!! Form::checkbox('tech[]', $t->user_id     ) !!} 
                        
                    {{ $t->name }}
                    </label>
                </div>
       
        @endforeach
    </div>
    
    @elseif($user->hasRole('technician'))

        {!! Form::checkbox('tech[]',$user->id, $user->id) !!} 
                        {{ $user->profile()->first()->name }}


     @endif

    <div class="form-group">
        {!! Form::submit('ปรับเปลี่ยนสถานะงานซ่อม', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

    @if($notify->status=='operating')
    {!! Form::model($notify, array('route' => array('notify.update', $notify->id), 'method' => 'PUT')) !!}
    {!! Form::hidden('statusN', 'rating') !!}
   
    {!! Form::submit('งานเสร็จเรียบร้อย', ['class' => 'btn btn-danger','onclick' => 'return confirm("Are you sure?");']) !!}

    {!! Form::close() !!}
    @endif
  </div>

   
@endsection