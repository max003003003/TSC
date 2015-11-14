<!DOCTYPE html>
@extends('app')
 
@section('content')
<body>
      <table class="table">
       <thead>
        <tr>
            <th>#</th>
            <th>Name</th>            
            <th colspan="2"><a href="{{ URL::route('department.create') }}" class="btn btn-primary btn-block">Create</a></th>
        </tr>
        </thead>
     <tbody>
      
	@foreach($department as $dep)
            <tr>
                <td>{{ $dep->id }}</td>
                <td>{{ $dep->name }}</td>
                 <td width="80">
                 <a class="btn btn-warning" href="{{ URL::route('department.edit', $dep->id) }}">Edit</a> 
                </td>
                 <td width="80">{!! Form::open(['route' => ['department.destroy', $dep->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?");']) !!}
                        {!!  Form::close() !!}</td> 
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
