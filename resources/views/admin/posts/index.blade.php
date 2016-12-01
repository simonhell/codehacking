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
                      <td><a href="{{route('posts.edit',$post->id)}}">{{ $post ->user->name}}</a></td>
                      <td><img src="{{$post->photo ? $post->photo->path : App\Photos::placeholder()}}" height="50" alt=""/> </td>
                      <td>{{ $post->category->name }}</td>
                      <td>{{ $post->title }}</td>
                      <td> {{ str_limit($post->content,50) }}</td>
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