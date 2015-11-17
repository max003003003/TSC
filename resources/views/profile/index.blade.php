<!DOCTYPE html>
@extends('app')
 
@section('content')
<body>
      <table class="table">
       <thead>
        <tr>
            <th>#</th>
            <th>Name</th> 
            <th>email</th>
            <th>Department</th>
            <th>Tel</th>
                  
            <th colspan="2"><a href="{{ URL::route('profile.create') }}" class="btn btn-primary btn-block">Create</a></th>
        </tr>
        </thead>
     <tbody>
      
	@foreach($profile as $prof)
            <tr>
                <td>{{ $prof->id}}</td>
                <td>{{ $prof->name}}</td>                       
                <td>{{ $prof->user()->first()->email }}</td>   
                @if($prof->department !='')
                <td> {{$prof->department->first()->name }} </td>
                @else
                <td> </td>
                @endif
                <td>{{ $prof->tel }}</td>
                
                 <td width="80">
                 <a class="btn btn-warning" href="{{ URL::route('profile.edit', $prof->id) }}">Edit</a> 
                </td>
              
            </tr>
        @endforeach
   
     </tbody>
     </table>
	 
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
