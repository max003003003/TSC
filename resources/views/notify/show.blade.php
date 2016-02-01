@extends('home')

@section('content')
<div class="container">    

<div class="well" >  

    <fieldset > 
        <legend>ใบแจ้งซ่อมที่: {{ $notify->id}}</legend>
        <div class="row">
           <div class="col-md-4 col-md-offset-1 "><h2>ชื่อผู้แจ้ง :</h2></div>  
       </div>
        <div class="row">
           <div class="col-md-3 col-md-offset-3"><h2>

             <a href="/../profile/{{$user->profile()->first()->id}}">
           {{$user->profile()->first()->name}}</a></h2></div>         
        </div>


                 
        <div class="row">
           <div class="col-md-4 col-md-offset-1 "><h2>รายละเอียด :</h2></div>
  
       </div>
        <div class="row">
           <div class="col-md-3 col-md-offset-3"><h2>{{$notify->describe}}</h2></div>         
        </div>

        <div class="row">
           <div class="col-md-4 col-md-offset-1"><h2>สถานที่ : </h2></div>
  
       </div>
        <div class="row">
           <div class="col-md-3 col-md-offset-3"><h2>{{$notify->location}}</h2></div>         
        </div>
         <div class="row">
           <div class="col-md-4 col-md-offset-1"><h2>สถานะ : </h2></div>
  
       </div>
        <div class="row">
           <div class="col-md-3 col-md-offset-3"><h2>{{$notify->status}}</h2></div>         
        </div>

     <div class="row">
           <div class="col-md-4 col-md-offset-1"><h2>แผนก : </h2></div>
  
       </div>
        <div class="row">
           <div class="col-md-3 col-md-offset-3"><h2>{{$notify->department()->first()->name}}</h2></div>         
        </div>
         <div class="row">
           <div class="col-md-4 col-md-offset-1"><h2>ช่างผู้รับผิดชอบ : </h2></div>
  
       </div>
        <div class="row">
           <div class="col-md-3 col-md-offset-3">
           @if($notify->tech())
                        <ol>
                        @foreach( $notify->tech()->get()  as $t)
                            <br>  
                                <h2><li>
                                  <a href="/../profile/{{ $t->profile()->first()->id  }}">    
                                      {{ $t->profile()->first()->name }} 
                                  </a>
                                </li></h2>
                        @endforeach
                        </ol>
                     @endif


           </div>         
        </div>
           <div class="row">
           <div class="col-md-4 col-md-offset-1"><h2>สถานะการประเมิน : </h2></div>
  
       </div>
        <div class="row">
           <div class="col-md-3 col-md-offset-3"><h2>
                 @if($notify->rate()->first()->a =='')
                            ยังไม่ประเมิน
                        @else
                            ประเมินแล้ว
                @endif
           </h2></div>         
        </div>

         <div class="row">
           <div class="col-md-4 col-md-offset-1"><h2>หมายเหตุ : </h2></div>
  
       </div>
        <div class="row">
           <div class="col-md-3 col-md-offset-3"><h2>{{$notify->comment}}</h2></div>         
        </div>

        <div class="row">
           <div class="col-md-4 col-md-offse-1"><h2>เวลาแจ้งซ่อม : </h2></div>  
       </div>
        <div class="row">
           <div class="col-md-6 col-md-offset-3"><h2>  
        {{  \App\Datethai::Datethai($notify->created_at)       }}

           </h2></div>         
        </div>

         <div class="row">
           <div class="col-md-4 col-md-offse-1"><h2>เวลาเสร็จสิ้น : </h2></div>  
       </div>
       @if($notify->status=="rating"||$notify->status=="finished")
        <div class="row">
           <div class="col-md-6 col-md-offset-3"><h2>  
           {{ \App\Datethai::Datethai($notify->updated_at)  }}

           </h2></div>         
        </div>
       @endif

        <a class="btn btn-primary" href="/../" role="button">กลับ</a>
              






                            </fieldset>
                   </div>
                </div>
             </div> 
        </div>       
     </div>
 </div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</html>
@endsection