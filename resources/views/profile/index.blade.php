@extends('home')
<!-- app -->
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th> 
            <th>email</th>
            <th>Department</th>
            <th>Tel</th>         
           
        </tr>
        </thead>
        <tbody>
        @if($profile)
        @foreach($profile as $prof)
            <tr>
                
                <td>
                 <a href="/../profile/{{ $prof->id }}">    
                       {{ $prof->id }}
                  </a></td>
                <td>{{ $prof->name }}</td>
                <td>{{ $prof->user()->first()->email}}
                 @if($prof->department !='')
                <td> {{$prof->department()->first()->name }} </td>
                @else
                <td> </td>
                @endif
                <td>{{ $prof->tel }}</td>
                 
                <td width="80"><a class="btn btn-warning" href="{{ URL::route('profile.edit', $prof->id) }}">Edit</a></td>
                
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
 
@stop