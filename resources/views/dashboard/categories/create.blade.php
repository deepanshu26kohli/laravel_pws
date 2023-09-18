@extends('dashboard.layout')
@section('content')
<form action = "{{route('categories.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputCategoryTitle">Name</label>
            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Category Title">
        </div>
        <div class="form-group col-md-12">
            <label for="inputContent">Name</label>
            <textarea type="text" name="name" class="form-control" id="inputEmail4" placeholder="Category Title"></textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Name</label>
            <input type="file" name="thumbnail" class="form-control" id="inputEmail4" placeholder="Category Title">
        </div>
        <div class="form-group col-md-12">
            <label for="inputContent">Name</label>
            <select type="text" name="name" class="form-control" id="inputEmail4" placeholder="Category Title">
                <option value="0">Select A Parent Category</option>
                @if(!$categories->isEmpty())
                @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option> 
                @endforeach
                @endif
            </select>
        </div>
 
    <button type="submit" class="btn btn-primary my-3">Add New Category</button>
</form>
@endsection