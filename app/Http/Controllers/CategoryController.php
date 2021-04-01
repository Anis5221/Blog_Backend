<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
        $cat = Category::all();
        return response()->json(compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
       $title = $request->title;
       $slug = Str::slug($title);
       $cat = Category::create(['title'=>$title, 'slug'=>$slug, 'acitve'=>1]);
       if($cat){
        return response()->json(compact('cat'),200);
       }else{
        return response()->json([
            'error' => 'something want wrong'
        ],404);
    }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json(compact('category'), 200);
    }


    public function edit(Category $category)
    {
        return response()->json(compact('category'), 200);
    }


    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json(["success", "updated"]);
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['success', 'Deleted']);
    }
}
