@extends('home')

@section('content')
<div class="container">
 <table class="table">
     <h1># : {{ $profile->id}}</h1>
     <h1>ชื่อ : {{$profile->name}}</h1>
     <h1>เบอร์โทร : {{$profile->tel}}</h1>      
     <h1>แผนก : {{$profile->department()->first()->name}}</h1>
     
     

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</html>
@stop