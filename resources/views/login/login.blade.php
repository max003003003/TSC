 
@extends('login.master')

@section('title')
   Login

@endsection

@foreach($errors as $error)
	<p>{{$error}}</p>
@endforeach


@section('content')
    {!! Html::link('/users/create') !!}

  
	{!! Form::open(array('url' => 'login')) !!}
<h1>Login</h1>

<!-- if there are login errors, show them here -->
<p>
    {!! $errors->first('email') !!}
    {!! $errors->first('password') !!}
</p>

<p>
    {!! Form::label('email', 'Email Address') !!}
    {!! Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) !!}
</p>

<p>
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password') !!}
</p>

<p>{!! Form::submit('Submit!') !!}</p>
{!! Form::close() !!}

 @endsection