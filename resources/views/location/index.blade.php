@extends('home')
<!-- app -->
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>name</th>           
            <th colspan="2"><a href="{{ URL::route('location.create') }}" class="btn btn-primary btn-block">Create</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($location as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->name }}</td>
                 
                <td width="80"><a class="btn btn-warning" href="{{ URL::route('location.edit', $location->id) }}">Edit</a></td>
                <td width="80">{!! Form::open(['route' => ['location.update', $location->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("กรุณาตรวจสอบอย่างถี่ถ้วนไม่เช่นนั้นอาจทำให้ระบบทำงานผิดพลาด");']) !!}
                    {!!  Form::close() !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
 
@stop