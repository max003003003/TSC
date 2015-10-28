@extends('login.master')

@section('title')
	Wellcome 
@endsection
@section('content')

      Wellcome.
      <p> {{$email}} </p>

      <a href="{{ URL::to('logout') }}">Logout</a>
@endsection