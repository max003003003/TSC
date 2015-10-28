@extends('login.master')

@section('title')
  Join Us
@stop
@section('content')
   @if(count($errors)!=0)
     <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <p> {{ $error }}</p>



    @endforeach
      </div>
   @endif


  {!!  Form::open(array('url' => 'users','role' => 'form'))!!}

     <div class="form-group">
       {!! Form::label('Username','Userrname*')!!}
       {!! Form::text('name') !!}
     </div>

       <div class="form-group">
       {!! Form::label('password','Password*')!!}
       {!! Form::password('password') !!}

     </div>

        <div class="form-group">
       {!! Form::label('password-repeat','Password-Repeat*')!!}
       {!! Form::password('password-repeat') !!}

     </div>

     <div class="form-group">
    {!! Form::label('email','email*')!!}
    {!! Form::text('email') !!}

        <div class="form-group">
        {!! Form::submit('Join!', array('class'=>'btn btn-primary')) !!}
       </div>


  {!! Form::close() !!}

@stop
