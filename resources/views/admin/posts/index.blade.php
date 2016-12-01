@extends('layouts.admin')


@section('content')

    <h1>All Posts</h1>

     <table class="table ">
         <thead>
            <tr>
               <th>Id</th>
               <th>Owner</th>
               <th>Photo</th>
               <th>Category</th>
               <th>Title</th>
               <th>Content</th>
               <th>Created_at</th>
               <th>Updated_at</th>
            </tr>
         </thead>
         <tbody>

          @if(count($posts) > 0 )

              @foreach($posts as $post)

                  <tr>
                      <td>{{ $post->id  }}</td>
                      <td>{{ $post ->user->name}}</td>
                      <td><img src="{{ $post->photo->path }}" height="50" alt=""/> </td>
                      <td>{{ $post->category->name }}</td>
                      <td>{{ $post->title }}</td>
                      <td> {{ $post->content }}</td>
                      <td> {{ $post->created_at->diffForHumans() }}</td>
                      <td> {{ $post->updated_at->diffForHumans() }}</td>
                  </tr>

              @endforeach
          @endif

         </tbody>
       </table>


@endsection


@section('footer')


@endsection