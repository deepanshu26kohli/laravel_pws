<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('children')->get();
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->content = $request->content;
        $filename = sprintf('thumbnail_%s.jpg',random_int(1,1000));
        if($request->hasFile('thumbnail'))
                $filename =  $request->file('thumbnail')->storeAs('images',$filename,'public');
        else
                $filename = null;
        $category->thumbnail = $filename;
        $category->parent_id = $request->parent_id; 
        $save = $category->save();
        if($save){
        return redirect()->route('categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if(!$category){
            return back();
        }
 
        return view('dashboard.categories.show',compact('category')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       $categories = Category::where('id','<>',$category->id)->get(); 
       return view("dashboard.categories.edit",compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    { 
        // dd($request->parent_id);
        $category->title = $request->title;
        $category->content = $request->content;
        $filename = sprintf('thumbnail_%s.jpg',random_int(1,1000));
        if($request->hasFile('thumbnail'))
                $filename =  $request->file('thumbnail')->storeAs('images',$filename,'public');
        else
               $filename = 'images/dummy.jpg';

        $category->thumbnail = $filename;
        $category->parent_id = $request->parent_id; 
        $save = $category->save();
        if($save){
        return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $category->delete();
       return redirect()->route('categories.index');
    }
}
