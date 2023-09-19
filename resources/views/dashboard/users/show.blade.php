@extends('dashboard.layout');
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Users Section</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a type="button" href="{{route('users.create')}}" class="btn btn-sm btn-outline-secondary">Add New User</a>

      </div>
     
    </div>
  </div>
@if($users):
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Thumbnail</th>
        <th scope="col">City</th>
        <th scope="col">Country</th>
        <th scope="col">Roles</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>{{$role->created_at}}</td>
                <td>{{$role->updated_at}}</td>
                <td><img src="{{asset($user->profile->photo)}}" alt="" width="50" height="50"/></td>
                <td>{{$user->profile->city}}</td>
                <td>{{$user->profile->country->name}}</td>
                <td>
                  @if(!$user->roles->isEmpty())
                     {{$user->roles->implode('name',', ')}}
                  @endif    
                </td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    <a href="{{route('users.show',$user->id)}}">Show</a> |
                    <form action="{{route('users.destroy',$user->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn-link btn" >Delete</button>
                    </form>
                    | 
                    <a href="{{route('users.edit',$user->id)}}">Edit</a>  
                </td>
            </tr>

    </tbody>
  </table>
</div>

    
@else
  <p>No users found</p>  
@endif
@endsection