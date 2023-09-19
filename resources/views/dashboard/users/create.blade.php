@extends('dashboard.layout')
@section('content')
<form action = "{{route('users.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Name</label>
            <input type="text" name="username" class="form-control" id="inputEmail4" placeholder="Username">
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Full Name</label>
            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Full Name">
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Email</label>
            <input type="text" name="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Password</label>
            <input type="password" name="password" class="form-control" id="inputEmail4">
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Phone</label>
            <input type="text" name="phone" class="form-control" id="inputEmail4" placeholder="9876543567">
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Select Country</label>
            <select name="country" id="">
                @if(!$countries->isEmpty())
                   @foreach ($countries as $country)
                   <option value="{{$country->id}}">{{$country->name}}</option>
                   @endforeach
                @endif
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">City</label>
            <input type="text" name="city" class="form-control" id="inputEmail4" placeholder="Enter Your City">
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Select Roles</label>
            <select name="roles[]" class="form-control" id="selectRoles" multiple>
                @if(!$roles->isEmpty())
                    @foreach($roles as $role)
                         <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                @endif
            </select>   
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Profile Image</label>
            <br>
            <input type="file" name="photo">
        </div>
       
    <button type="submit" class="btn btn-primary my-3">Add New Role</button>
</form>
@endsection