<?php

namespace App\Http\Controllers;

use App\Models\Post;
use File;
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
        $postList = Post::latest()->get();
        return response()->json(compact('postList'), 200);
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
            $image = $request->image;
            $imagename = time().'_'.uniqid().'.'.$request->image->getClientOriginalExtension();
            $imagepublicpath = public_path('storage/image');
            $image->move($imagepublicpath, $imagename);
            $imagepath = '/storage/image/'.$imagename;
        }
        $attributes = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'user_id' => 1,
            'image' => $imagepath??null,
            'category_id' => $request->category_id,
            'sort_description' => $request->sort_description,
            'long_description' => $request->long_description,
            'active' => 1
        ];

        Post::create($attributes);

        return response()->json('success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return response()->json(compact('post'));
    }


    public function update(Request $request, Post $post)
    {
       
        
        if($request->hasFile('image')){
            $image = $request->image;
            $imagename = time().'_'.uniqid().'.'.$request->image->getClientOriginalExtension();
            $imagepublicpath = public_path('storage/image');
            $image->move($imagepublicpath, $imagename);
            if(File::exists($post->image)){
                unlink($post->image);
            }
            $imagepath = '/storage/image/'.$imagename;
        }
        if($imagepath == null){
            $imagepath = $post->image;
        }
       

        $attributes = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'user_id' => 1,
            'image' => $imagepath??null,
            'category_id' => $request->category_id,
            'sort_description' => $request->sort_description,
            'long_description' => $request->long_description,
            'active' => 1
        ];

        $result = $post->update($attributes);

        return response()->json(compact('result'),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(File::exists($post->image))
        {
            unlink($post->image);
        }
        $post->delete();
        return response()->json('success', 200);
    }
}
