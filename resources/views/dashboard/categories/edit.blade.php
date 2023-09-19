@extends('dashboard.layout')
@section('content')
<form action = "{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputCategoryTitle">Category Title</label>
            <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="Category Title" value="{{$category->title}}">
        </div>
        <div class="form-group col-md-12">
            <label for="inputContent">Category Content</label>
            <textarea type="text" name="content" class="form-control" id="inputEmail4" placeholder="Category Content" >{{$category->content}}</textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="inputEmail4">Choose Category image</label>
            <input type="file" name="thumbnail" class="form-control" id="inputEmail4" placeholder="Category Title">
        </div>
        <div class="form-group col-md-12">
            <img style="height:10vh; width:10vh" src="{{asset("storage/".$category->thumbnail)}}"/>
            <label for="inputContent"></label>
            <select type="text" name="parent_id" class="form-control" id="inputEmail4" placeholder="Category Title">
                <option value="0">Select A Parent Category</option>
                @if(!$categories->isEmpty())
                @foreach ($categories as $cats)
                        <option  @if($category->parent->id == $cats->id){{'selected'}} @endif value="{{$cats->id}}">{{$cats->title}}</option> 
                @endforeach
                @endif
            </select>
        </div>
 
    <button type="submit" class="btn btn-primary my-3">Edit Category</button>
</form>
@endsection