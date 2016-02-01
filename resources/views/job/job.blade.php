@extends('home')

@section('content')

<body>
      <table class="table">
       <thead>
        <tr>
            <th>#</th>
            <th>Describe</th>
            <th>Location</th>
            <th>Status</th>
            
        </tr>
        </thead>
     <tbody>
  @if($notifies)
	@foreach($notifies as $notify)
            <tr>
                <td>
                 <a href="/../notify/{{ $notify->id }}">    
                       {{ $notify->id }}
                  </a></td>
                <td>{{ $notify->describe }}</td>
                <td>{{ $notify->location }}</td>
                <td>{{ $notify->status }}</td>                
                {!! Form::model($notify, array('route' => array('job.update', $notify->id), 'method' => 'PUT')) !!}
                {!! Form::hidden('status', 'operating') !!}
                {!! Form::hidden('tech_id', $user->id) !!}
                {!! Form::hidden('o',2) !!}
                <td width="150">
               <div class="form-group">
               {!! Form::submit('รับงานซ่อมนี้', ['class' => 'btn btn-primary']) !!}
               {!! Form::close() !!}
            

              @if($user->hasRole('captain'))
                      <th colspan="2"><a href="/../job/{{$notify->id}}/edit"  class="btn btn-primary btn-block">มอบหมายงาน</a></th>
              @endif
                      
                      </div>
                    
                    
                </td>
                
            </tr>
        @endforeach
        @endif
     </tbody>
     </table>
	 
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
@stop
