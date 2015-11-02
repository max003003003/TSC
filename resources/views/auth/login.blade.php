@extends('master')

@section('title')
	Login
@endsection
@section('content')
<link href="/css/login.css"  rel="stylesheet" >
	<div  class="container col-md-6 col-md-offset-3">

 
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}




      <form class="form-signin">
      <div class="form-group">
        <h2 class="form-signin-heading">Please sign in</h2>
           <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    </div>
 
      <div class="form-group">
   <div>
        Password
        <input type="password" name="password" id="password">
    </div>
    </div>

    
      <div class="form-group">
    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>     
       </div>

      <div class="form-group">
        <button class="btn  btn-primary " type="submit">Sign in</button>
      </div>
    </form>

</form>
</div>

@endsection