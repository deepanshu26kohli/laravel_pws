@extends('dashboard.layout')
@section('content')
<form action = "{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputCategoryTitle">Name</label>
            <input type="text" name="username" class="form-control" id="inputEmail4" placeholder="Category Title" value="{{$user->username}}">
        </div>
        <div class="form-group col-md-12">
            <label for="inputContent">Full Name</label>
            <textarea type="text" name="name" class="form-control" id="inputEmail4" placeholder="Category Content" >{{$user->name}}</textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Email</label>
            <input type="text" placeholder="Enter a Valid Email" value="{{$user->email}}">
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Phone</label>
            <input type="text" placeholder="Enter a Valid Email" value="{{$user->profile->phone}}">
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Select Country</label>
            <select name="country" id="">
                @if(!countries->isEmpty())
                   @foreach ($countries as $country)
                   <option @if($country->id == $user->profile->country->id) {{'selected'}} @endif value="{{$country->id}}">{{$country->name}}</option>
                   @endforeach
                @endif
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">City</label>
            <input type="text" name="city" placeholder="Enter your city name" value="{{$user->profile->city}}">
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Select Roles</label>
            <select name="roles[]" class="form-control" id="selectRoles" multiple>
                @if(!roles->isEmpty())
                    @foreach($roles as $role)
                        <option @if(in_array($role->id,$user->roles->pluck('id')->toArray())) {{"selected"}} @endif value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                @endif
            </select>   
        </div>
        <div class="form-group col-md-12">
            <img src="{{asset($user->profile->photo)}}" alt="">
        </div>
    <button type="submit" class="btn btn-primary my-3">Edit Category</button>
</form>
@endsection