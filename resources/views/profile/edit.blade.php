@extends('app')

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

    {!! Form::model($department, ['route' => ['department.update', $department->id], 'method' => 'PATCH']) !!}

    <div class="form-group">
        {!! Form::label('name', 'name') !!}
        {!! Form::text('name', $department->name, ['class' => 'form-control']) !!}
    </div>

    
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@stop