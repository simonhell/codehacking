@extends('layouts.admin')

@section('content')
    <h1>Users</h1>

    @if($users)
     <table class="table table-bordered">
         <thead>
           <tr>
               <th>ID</th>
               <th>Picture</th>
               <th>Lastname</th>
               <th>Email</th>
               <th>Role</th>
               <th>Active</th>
               <th>Created at</th>
               <th>Updated at</th>
           </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img src="{{$user->photo ? $user->photo->path : \App\Photos::placeholder()}}" alt="" height="75"/></td>
                    <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active_string}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach

         </tbody>
       </table>
    @endif



    <a href="{{route('users.create')}}">Create User</a>
@endsection

@section('footer')


@endsection