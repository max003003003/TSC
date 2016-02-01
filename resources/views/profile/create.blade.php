@extends('home')
<!-- app -->
@section('content')

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

    {!! Form::open(['route' => 'department.store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

     

     

    <div class="form-group">
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@stop