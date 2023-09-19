@extends('dashboard.layout')
@section('content')
<form action = "{{route('categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputCategoryTitle">Category Title</label>
            <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="Category Title">
        </div>
        <div class="form-group col-md-12">
            <label for="inputContent">Category Content</label>
            <textarea type="text" name="content" class="form-control" id="inputEmail4" placeholder="Category Content"></textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Category Image</label>
            <input type="file" name="thumbnail" class="form-control" id="inputEmail4" placeholder="Category Title">
        </div>
        <div class="form-group col-md-12">
            <label for="inputContent">Parent Category</label>
            <select type="text" name="parent_id" class="form-control" id="inputEmail4" placeholder="Category Title">
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