@extends('login.master')

@section('title')
    Users
@stop

@section('content')
 <head>List of User</head>
 <ul>
  @foreach($users as $user)
      <li> {{$user->name}} </li>
  @endforeach
</ul>
@stop
