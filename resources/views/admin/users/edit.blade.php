@extends('layouts.admin')


@section('content')

    <h1>Create Users</h1>

    <div class="row">
        <div class="col-sm-3">
            <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->path : \App\Photos::placeholder()}}" alt=""/>
        </div>
        <div class="col-sm-9">

            {{ Form::model($user, array( 'route' => array('users.update', $user->id), 'method'=>'PUT', 'files'=>true)) }}

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
                {!! Form::select('is_active',array(1=>'active', 0 =>'inactive'), $user->is_active,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id',array(''=>'Choose Options ...')+ $roles, null,['class'=>'form-control'])!!}
            </div>



            <div class="form-group">
                {!! Form::label('file', 'Foto:') !!}
                {!! Form::file('file',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password',['class'=>'form-control'])!!}
            </div>

            {!! Form::submit('Save User', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>


    <div class="row">
        <div class="col-sm-9">
            @include('includes.errors')

        </div>

    </div>

@endsection