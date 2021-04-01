<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'title' => 'required|unique:posts|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            'sort_description' => 'required|max:255',
            'long_description' => 'required|max:255'
        ]);

        if($request->hasFile('image')){

            $imagename = time().'_'.uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/image', $imagename));
            $imagepath = 'storage/image'.$imagename;
        }
        $attributes = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $imagepath??null,
            'category_id' => $request->category_id,
            'sort_description' => $request->sort_description,
            'long_description' => $request->long_description,
            'active' => 1
        ];

        return response()->json(compact('attributes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
