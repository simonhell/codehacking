@extends('layouts.admin')

@section('content')
<h1>Categories</h1>


    {{Form::open(array('action' => 'AdminCategoriesController@store', 'method'=>'POST' ))}}

        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">

            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}

        </div>

    {{ Form::close() }}

         <table class="table">
             <thead>
               <tr>
                 <th>Category ID</th>
                 <th>Name</th>
               </tr>
             </thead>
             <tbody>

                  @if(count($categories) > 0 )
                       @foreach($categories as $category)

                           <tr>
                              <td>{{ $category->id }}</td>
                               <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                           </tr>

                       @endforeach
                   @endif
             </tbody>
           </table>




@endsection

@section('footer')


@endsection