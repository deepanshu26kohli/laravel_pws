@extends('dashboard.layout')
@section('content')
<form action = "{{route('roles.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Add New Role</label>
            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Role Name">
        </div>
 
    <button type="submit" class="btn btn-primary my-3">Add New Role</button>
</form>
@endsection