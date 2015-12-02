<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>   
</head>
<div class="container">
 <table class="table">
     <h1># : {{ $profile->id}}</h1>
     <h1>ชื่อ : {{$profile->name}}</h1>
     <h1>เบอร์โทร : {{$profile->tel}}</h1>      
     <h1>แผนก : {{$profile->department()->first()->name}}</h1>
     
     

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</html>