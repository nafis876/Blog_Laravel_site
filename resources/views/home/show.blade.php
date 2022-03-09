@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        {{-- <div class="card-header" style="color: blue;"><a class="navbar-brand" href="/home">Home</a> --}}
            @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
            @endif

            @if ($message = Session::get('error'))
                  <div class="alert alert-danger">
                      <p>{{ $message }}</p>
                  </div>
            @endif

        </div>
            <div class="col-md-9">
                    <div class="card mb-4">
                        <div class="card-header">
                            @if($post->thumbnail)
                            <img src="{{$post->thumbnail_path()}}" alt="Post Image" class="rounded-circle" 
                            style="float: left; margin-right:15px;" width="400">
                            @endif
                            <a href="/posts/{{$post->id}}" > <h3>{{$post->title}}</h3></a>
                        </div>
        
                        <div class="card-body"> 
                           
                            <h3>{!!$post->body!!}</h3>  
                            
                        </div>
    
                        <div class="card-footer"> 
                            {{$post->likes()->count()}} People Like This post|
                            {{-- @auth--}}
                                  <a  href="/posts/{{$post->id}}/liked" class="btn btn-sm {{$post->LikeByCirrentUser() ? "btn-danger" : "btn-success"}} ">
                                     {{$post->LikeByCirrentUser() ? "Dislike" : "like"}}</a> 
                            {{--@endauth  --}}

                            <div class="pull-right">
                                @foreach ($post->tags as $tag)
                                  
                                  @if ($loop->last)
                                  <a href="{{route('search.tag',['tag' =>$tag->id])}}">{{$tag->name}}</a>
                                  @else
                                  <a href="{{route('search.tag',['tag' =>$tag->id])}}">{{$tag->name}} ,</a>
                                      
                                  @endif
                                     
                                @endforeach
                            </div>
                            
                        </div>
                   </div>
    
                   <hr>
                   <h2 style="color: aqua;">Add New Comments</h2>
                   <hr>
    
                   <div class="card mb-4">
    
                        <div class="card-body"> 
                        
                               @if ($errors->any())
                                 <div class="alert alert-danger">
                                     <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                     <ul>
                                         @foreach ($errors->all() as $error)
                                             <li>{{ $error }}</li>
                                         @endforeach
                                     </ul>
                                 </div>
                              @endif
                             <form action="/posts/{{$post->id}}/comments" method="post" >
                                @csrf
                      
                                      <div class="form-group">
                                          <label for="body" style="color:blue;">Comments  :</label>
                                          <textarea name="body" id="body" class="form-control"  row="7" placeholder="Tell something about the post"></textarea>
                                      </div>
                                      <hr>
             
                                     <button type="submit" class="btn btn-info"  > Save </button>
                             </form>
                        </div>
                  </div>
    
                   <hr>
                   
                   <h3>Comments :</h3>
                         @foreach ($post->comments as $comment)
                                    <div class="card mb-3">
                                            <div class="card-header">
                                                 <h4 style="color: darkorchid;">'{{$comment->owner->name}}' : <a href="/comments/{{$comment->id}}/liked" 
                                                    class="btn btn-sm {{$comment->LikeByCirrentUser() ? "btn-danger" : "btn-success"}} ">
                                                     {{$comment->LikeByCirrentUser() ? "Dislike" : "like"}}</a>
                                                      <span class=" btn btn-success pull-right" style="color: firebrick;">{{$comment->likes()->count()}} LIKE</span>
                                                </h4>
                                            </div>
                        
                                            <div class="card-body">
                                                
                                               
                                                <h5>{{$comment->body}}</h5>
                                                    
                                                
                                                
                                            </div>
                                    </div>
                          @endforeach
                 
                   <hr>
    
                   
    
                              
            </div>
    
               <div class="col-md-3">
                   <div class="card">
                       <div class="card-header">Categories</div>
       
                       <div class="card-body">
                           <lu class="list-group">
                                @foreach ($categories as $category)
                                   <li claass="list-group-item"><a href="/posts/{{$category->id}}/category">{{$category->name}}</a></li>
                                 
                                 @endforeach
                          </lu>
       
                           
                       </div>
                   </div>
               </div>
        </div>
</div>
@endsection