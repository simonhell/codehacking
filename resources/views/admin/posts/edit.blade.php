@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo ? $post->photo->path : App\Photos::placeholder()}}" height="50" alt=""/>
        </div>
        <div class="col-sm-9">

            {{ Form::model($post, ['method'=>'PATCH', 'files'=>true, 'action'=>['AdminPostsController@update', $post->id]]) }}

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

            {{ Form::submit('Update Post', ['class'=>'btn btn-primary']) }}

            {{ Form::close() }}

            {{ Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) }}


            <div class="form-group">

                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}

            </div>

            {{ Form::close() }}

        </div>
    </div>

@endsection


@section('footer')


@endsection