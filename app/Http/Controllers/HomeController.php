<?php

namespace App\Http\Controllers;

//use auth;
use auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('status', 1)->paginate(20);
        $categories = Category::all();
        
        return view('home.index',compact('posts','categories'));
    }

    public function show(Post $post)
    {
        if(auth()->check()){
        
           if(! $post->status && auth()->user()->user_type !='admin') {return back();}
        }
        else{
        
          if(! $post->status ){ return back();}
        } 
         
        $categories = Category::all();
        return view('home.show',compact('post','categories'));
    }
}
