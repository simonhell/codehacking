@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>


    {{ Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) }}

    <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name',null,['class'=>'form-control'])}}
    </div>

    <div class="form-group">

        {!! Form::submit('Edit Category', ['class'=>'btn btn-primary']) !!}

    </div>

    {{ Form::close() }}

    
    {{ Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) }}
    
        {{ Form::submit('Delete Category', ['class'=>'btn btn-danger']) }}
    
    {{ Form::close() }}




@endsection

@section('footer')


@endsection