<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/select2-bootstrap-theme/select2-bootstrap.min.css" type="text/css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post  page</title>
</head>
<body>
    <h1 style="color:red;text-align:center;">Update Post Information Here!</h1>
    <form action="/posts/{{ $post->id }}/update" method="POST" > 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="name" value="{{ $post->title }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Body:</strong>
                    <textarea type="text" id="post_body" name="body"  class="form-control" placeholder="body">{{ $post->body }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="thumbnail" style="color:blue;">Thumbnail</label>
                <input name="thumbnail" id="thumbnail" class="form-control" type="file" >
                {{-- '{{asset("/uploads/post/$post->thumbnail")}}'      "/uploads/post/{{ $post->thumbnail }}"   --}}
                <img src='{{asset("/uploads/post/$post->thumbnail")}}' alt="Post Image" width="100">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" value="{{ $post->status }}" class="form-control" placeholder="status">
                </div>
            </div>

            <div class="form-group">
                <label for="category"> Category</label>
                <select name="category_id" id="category_id" type="text" class="form-control" placeholder="Posts Category" >
                    <option>Select Category</option>
                    @foreach ($categories as $category)
    
                        <option value="{{$category->id}}"{{$post->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tag">Post Tags</label>
                <select name="tag_id[]" id="tag_id" type="text" class="form-control" placeholder="Post Tags" multiple >
                    <option>Select Tags</option>
                    @foreach ($tags as $tag)
    
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User:</strong>
                    <input type="text" name="user_id" value="{{ $post->user_id }}" class="form-control" placeholder="user">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
     
    </form>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
         <script>
                             $(function() {
                                $('tag_id').select2();
                            });
                            $(function() {
                                $('category_id').select2();
                            }); 
         </script>
    

    <script>
        CKEDITOR.replace( 'post_body' );
    </script>
    
</body>
</html>