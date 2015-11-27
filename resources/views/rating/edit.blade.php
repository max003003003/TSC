<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

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
    
      <table class="table">
       <thead>
        <tr>
            <th>หัวข้อเรื่อง</th>
            <th>ระดับความพึงพอใจ</th>         
            
        </tr>
        </thead>
     <tbody>

            {!! Form::model($rate, array('route' => array('rating.update', $rate->id), 'method' => 'PUT')) !!}
            <tr>
                <td>

                 </td>

     
             
                
                <td>ต้องปรับปรุง</td>
                <td> ไม่พอใจ</td>
                   <td>ปานกลาง</td>
                              <td>ดี</td>
                                              <td>ดีมาก</td>
            </tr>
            <tr>
                <td>1.ความเอาใจใส่ในงานที่ได้รับมอบหมาย</td>   
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
                
                 <td> {!! Form::radio('5',  'เหมาะสม') !!}เหมาะสม</td>
                 <td> {!! Form::radio('5', 'ไม่เหมาะสม') !!}ไม่เหมาะสม</td>
                 <td></td>
                 <td></td>
                 <td></td>
                
           </tr>
           <tr>
                <td>6.ข้อเสนอแนะอื่นๆ</td>   
                
                 <td>{!! Form::text('comment') !!}</td>
                 
           </tr>
           
           
     


       

     </tbody>
     </table>
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    
    

    {!! Form::close() !!}
     
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

