@extends('layouts.admin')


@section('content')

    <h1>Create Users</h1>

    {!! Form::open(['action' =>'AdminUsersController@store','method'=>'POST', 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-Mail:') !!}
        {!! Form::email('email',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active',array(1=>'active', 0 =>'inactive'), 0,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id',array(''=>'Choose Options ...')+ $roles, null,['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password',['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('file', 'Foto:') !!}
        {!! Form::file('file',null,['class'=>'form-control'])!!}
    </div>


    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}


    @include('includes.errors')

@endsection