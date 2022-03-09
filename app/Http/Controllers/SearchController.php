<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function searchPostByCtegory(Category $category){

        $posts=$category->posts()->paginate(20);
        $categories=Category::all();

        return view('search.category',compact('posts','categories'));

    }

    public function searchPostByTag(Tag $tag){

        $posts=$tag->posts()->paginate(20);
        $categories=Category::all();

        return view('search.category',compact('posts','categories'));

    }
}
