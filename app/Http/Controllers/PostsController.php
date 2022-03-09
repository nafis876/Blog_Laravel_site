<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        $tags=Tag::all();

        return view('posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
        $validated_data=request()->validate([
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:3|max:2000',
            'category_id' =>'required|exists:categories,id',
            'tag_id' => 'exists:tags,id',
            'thumbnail' => 'image',
            // 'user_id'=>auth()->id()
            
            
        ]);
  
        // $input = $request->all();

        $tags_ids=request('tag_id');
        $tags=Tag::find($tags_ids);
    
        $post=Post::create(request()->except('_token','tag_id') );

        if(request()->hasFile('thumbnail')){

            $file = request()->file('thumbnail')->getClientOriginalName();
            $ext = request()->file('thumbnail')->getClientOriginalExtension();
            $file_name=$post->id .'.'. $ext;
            request()->file('thumbnail')->move('uploads/post',$file_name);

            $post->update([
                'thumbnail' => $file_name
            ]);
        }

        $post->tags()->attach($tags);
     
        return redirect('/posts/index')
                        ->with('success','categories created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories=Category::all();
        $tags=Tag::all();

        return view('posts.edit',compact('categories','post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        //

        request()->validate([
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:3|max:2000',
            'category_id' =>'required|exists:categories,id',
            'tag_id' => 'exists:tags,id',
            'thumbnail' => 'image'
                
            
        ]);

    

        $tags_ids=request('tag_id');
        $tags=Tag::find($tags_ids);
  
        // $input = $request->all();
    
        $post->update(request()->except('_token','tag_id') );

        
        if(request()->hasFile('thumbnail')){

            if(\File::exists("uploads/post/$post->thumbnail")){
                \File::delete("uploads/post/$post->thumbnail");
            }

            $file = request()->file('thumbnail')->getClientOriginalName();
            $ext = request()->file('thumbnail')->getClientOriginalExtension();
            $file_name=$post->id .'.'. $ext;
            request()->file('thumbnail')->move('uploads/post',$file_name);

            $post->update([
                'thumbnail' => $file_name
            ]);
        }

        $post->tags()->sync($tags);
     
        return redirect('/posts/index')
                        ->with('success','posts created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve(Post $post){


        $post->update([
            'status' =>( $post->status == 1)? 0 : 1
        ]); 

        return back()->with('success','Admin approve this post !!');
    }
}
