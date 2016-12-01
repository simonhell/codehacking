@extends('layouts.admin')


@section('content')

    <h1>Create Post</h1>


        {{Form::open(array('action' => 'AdminPostsController@store', 'method'=>'POST','files'=>true ))}}

            <div class="form-group">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{ Form::label('content', 'Content:') }}
                {{ Form::textarea('content',null,['class'=>'form-control ', 'rows'=>10])}}
            </div>

            <div class="form-group">
                {{ Form::label('category_id', 'Category:') }}
                {{ Form::select('category_id',array(''=>'Choose Option ...') + $categories,null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{ Form::label('photo', 'Photo:') }}
                {{ Form::file('photo',['class'=>'form-control '])}}
            </div>

            {{ Form::submit('Click Me!', ['class'=>'btn btn-primary']) }}

        {{ Form::close() }}




        <div class="row">
            @include('includes.errors')
        </div>


@endsection


@section('footer')


@endsection