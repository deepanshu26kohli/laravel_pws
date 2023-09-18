@extends('dashboard.layout')
@section('content')
<form action = "{{route('roles.update',$role->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Edit Role</label>
            <input value="{{$role->name}}" type="text" name="name" class="form-control" id="inputEmail4" placeholder="Role Name">
        </div>
    <button type="submit" class="btn btn-primary my-3">Edit Role</button>
</form>
@endsection