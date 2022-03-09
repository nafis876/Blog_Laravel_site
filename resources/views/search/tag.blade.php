<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts  page</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-header" style="color: blue;"><a class="navbar-brand" href="/home">Home</a></div>
        <div class="col-md-9">
              @forelse($posts as $post)
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
                    @empty
                    <h2 style="color: red;">No Post Avilable </h2>
                  
             @endforelse
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
</body>