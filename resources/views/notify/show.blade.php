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
     <h1># : {{ $notify->id}}</h1>
     <h1>รายละเอียด : {{$notify->describe}}</h1>
     <h1>สถานที่ : {{$notify->location}}</h1>
     <h1>สถานะ : {{$notify->status}}</h1>
     <h1>แผนก : {{$notify->department()->first()->name}}</h1>
     
     <h1>ช่างผู้รับผิดชอบ: 
     @if($notify->tech())
     <ol>
            @foreach( $notify->tech()->get()  as $t)
            <br>                
        
                <li>
                 <a href="/../profile/{{ $t->profile()->first()->id  }}">    
                       {{ $t->profile()->first()->name }}
                  </a></li>

            @endforeach
            </ol>
     @endif
     </h1>
     <h1>สถานะการประเมิน : 
  
            @if($notify->rate()->first()->a =='')
                ยังไม่ประเมิน
            @else
                ประเมินแล้ว
            @endif

     </h1>     
     <h1>
        สร้าง : {{



 date('d F Y  H:i:s', strtotime($notify->created_at->setTimezone(new DateTimeZone('Asia/Bangkok')))) }}

     </h1>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</html>