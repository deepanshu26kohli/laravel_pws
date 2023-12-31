@extends('dashboard.layout');
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Roles Section</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a type="button" href="{{route('roles.create')}}" class="btn btn-sm btn-outline-secondary">Add New Role</a>

      </div>
     
    </div>
  </div>
@if($role):
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Users</th>
      </tr>
    </thead>
    <tbody>
        
       
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->created_at}}</td>
                <td>{{$role->updated_at}}</td>
                <td></td>
                <td>
                   
                    <a href="{{route('roles.destroy',$role->id)}}">Delete</a> | 
                    <a href="{{route('roles.edit',$role->id)}}">Edit</a>
                </td>
            </tr>
       
    </tbody>
  </table>
</div>

    
@else
  <p>No roles record found</p>  
@endif
@endsection