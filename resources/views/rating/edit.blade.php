@extends('home')

@section('content')
<body>
@if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- <table class="table" >
       <thead>
        <tr>
            <th width="400">หัวข้อเรื่อง</th>
            <th >ระดับความพึงพอใจ</th>         
            
        </tr>
        </thead>
    </table> -->
    <table class="table table-bordered" >

        <tr>
            <th >หัวข้อเรื่อง</th>
            <th colspan="5" >ระดับความพึงพอใจ</th>         
            
        </tr>
        
     

            {!! Form::model($rate, array('route' => array('rating.update', $rate->id), 'method' => 'PUT')) !!}
            <tr>
                <td width="200" >

                 </td>

     
             
                <td width="100">ต้องปรับปรุง</td>
                <td width="100"> ไม่พอใจ</td>
                   <td width="100">ปานกลาง</td>
                              <td width="100">ดี</td>
                                              <td width="100">ดีมาก</td>
            </tr>
            <tr>
                <td >1.ความเอาใจใส่ในงานที่ได้รับมอบหมาย</td>   
                @for($i=1;$i<6;$i++)
                 <td> {!! Form::radio('1', $i) !!}</td>
                @endfor
           </tr>
           <tr>
                <td>2.ความรวดเร็วในการดำเนินงาน</td>   
                @for($i=1;$i<6;$i++)
                 <td> {!! Form::radio('2', $i) !!}</td>
                @endfor
           </tr>
           <tr>
                <td>3.เจ้าหน้าที่สามารถทำงานที่ได้รับมอบหมายได้</td>   
                @for($i=1;$i<6;$i++)
                 <td> {!! Form::radio('3', $i) !!}</td>
                @endfor
           </tr>
           <tr>
                <td>4.ความพึงพอใจของท่านในการรับบริการ</td>   
                @for($i=1;$i<6;$i++)
                 <td> {!! Form::radio('4', $i) !!}</td>
                @endfor
           </tr>
           <tr>
                <td>5.การดำเนินการใช้เวลาเหมาะสม</td>   
                
                 
                 <td> {!! Form::radio('5', 'ไม่เหมาะสม') !!}ไม่เหมาะสม</td>
                 <td colspan="4"> {!! Form::radio('5',  'เหมาะสม') !!}เหมาะสม</td>
                 
                
           </tr>

           
           
     


       

     
     
     <tr>
                <td>6.ข้อเสนอแนะอื่นๆ</td><td colspan="5"></td>
                
                 <tr>
                    <td width="285"></td>
                     <td colspan="5">
                         {!! Form::textarea('comment') !!}
                     </td>

                 </tr>
                 
           </tr>
           
    </table>
        {!! Form::submit('ยืนยัน', ['class' => 'btn btn-primary']) !!}
    
    

    {!! Form::close() !!}
     
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
@stop
