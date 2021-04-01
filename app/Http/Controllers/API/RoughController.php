<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoughController extends Controller
{
    public function getCategory(){
        $categorys = [];
        $bdCategory = \App\Models\Category::all();
        foreach($bdCategory as $category){
            $categorys[$category->id] = [
                'title' => $category->title,
                'id' => $category->id
            ];
        }
        return response()->json(compact('categorys'));
    }
}
