@extends('dashboard.layout');
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Category Section</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a type="button" href="{{route('categories.create')}}" class="btn btn-sm btn-outline-secondary">Add New Category</a>

      </div>
     
    </div>
  </div>
@if(!$categories->isEmpty()):
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Thumbnail</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Children</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td><img style="height:10vh; width:10vh" src="{{asset("storage/".$category->thumbnail)}}"/></td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                  @if(!$category->children->isEmpty())
                    @foreach ($category->children as $children)
                     {{$category->title}}
                    @endforeach
                  @else
                  {{'Parent Category'}}
                  @endif
                </td>
                <td>
                    <a href="{{route('categories.show',$category->id)}} ">Show</a> |
                    <form action="{{route('categories.destroy',$category->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn-link btn" >Delete</button>
                    </form>
                    | 
                    <a href="{{route('categories.edit',$category->id)}}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

    
@else
  <p>No Categories record found</p>  
@endif
@endsection