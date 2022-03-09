@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="card-header">Home Page</div> --}}
        <div class="col-md-9">
              @foreach ($posts as $post)
                         <div class="card mb-4">
                                 <div class="card-header">
                                     @if($post->thumbnail)
                                     <img src="{{$post->thumbnail_path()}}" alt="Post Image" class="rounded-circle" 
                                     style="float: left; margin-right:15px;" width="50">
                                     @endif
                                     <a href="/posts/{{$post->id}}" > <h3>{{$post->title}}</h3></a>
                                 </div>
             
                                 <div class="card-body">
                                     
                                    
                                     <h3>{{$post->body}}</h3>
                                         
                                     
                                     
                                 </div>
                         </div>
               @endforeach
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