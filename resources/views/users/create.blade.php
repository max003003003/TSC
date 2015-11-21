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
    {!! Html::script('js/create.js') !!}

    {!! Form::open(['route' => 'users.store']) !!}

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['required' => 'required','class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['required' => 'required','class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Password confirmation') !!}
        {!! Form::password('password_confirmation', ['required' => 'required','class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="">Roles</label>
        @foreach($roles as $role)
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('role[]', $role->id) !!} {{ $role->display_name }}
                </label>
            </div>
        @endforeach
    </div>
    <div class="form-group">
            {!! Form::label('profile', 'profile') !!}
    </div>

     <div class="form-group">
        {!! Form::label('name', 'name') !!}
        {!! Form::text('name', null, ['required' => 'required','class' => 'form-control']) !!}
    </div>

     <div class="form-group">
        {!! Form::label('tel', 'tel') !!}
        {!! Form::text('tel', null, ['required' => 'required','class' => 'form-control']) !!}
    </div>

     <label >แผนก</label>
          {!! Form::select('department_id', $department) !!} 

    <div class="form-group">
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@stop