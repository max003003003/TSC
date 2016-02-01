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
                <td> <a class="btn btn-primary" href="{{ URL::route('rating.edit', $notify->rate_id) }}">ประเมิน</a> 
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
