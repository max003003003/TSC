@extends('master')
@section('title')
     Register
@endsection
@section('content')
<link href="/css/login.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div  class="container col-md-4 col-md-offset-3">
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div   class="form-group">
        Name
        <input type="text" name="name"  class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        Email
        <input type="email" name="email"  class="form-control" value="{{ old('email') }}">
    </div class="form-group">

    <div class="form-group">
        Password
        <input type="password"  class="form-control" name="password">
    </div>

    <div class="form-group">
        Confirm Password
        <input type="password"  class="form-control" name="password_confirmation">
    </div>
   
    <!----- {!! Form::select('type', $types) !!}  -->
    {!! Form::select('user_type', array( '2'=>'บุลากร' ,'3'=> 'ช่างเทคนิค' ))  !!}    
   
   {!! Form::select('department_id', $types)  !!}
 

</div>




  

    
   
 
  
    



   <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
    


    
</form>
</div>


@endsection