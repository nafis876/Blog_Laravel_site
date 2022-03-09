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
    <title>Posts  page</title>
</head>
<body>
         <div class="container">
            <h1 style="color:red;text-align:center;">Create New Posts Here!</h1>
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
                <form action="/posts" method="post" enctype="multipart/form-data">
                   @csrf
         
                         <div class="form-group">
                             <label for="name"style="color:red;">Title</label>
                             <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                         </div>
        
                                  <div class="form-group">
                                      <label for="category">Post Category</label>
                                      <select name="category_id" id="category_id" type="text" class="form-control" placeholder="Posts Category" >
                                          <option>Select Category</option>
                                          @foreach ($categories as $category)
                          
                                              <option value="{{$category->id}}">{{$category->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="tag">Post Tags</label>
                                    <select name="tag_id[]" id="tag_id[]" type="text" class="form-control" placeholder="" multiple >
                                        <option>Select Tags</option>
                                        @foreach ($tags as $tag)
                        
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail" style="color:blue;">Thumbnail</label>
                                    <input name="thumbnail" id="thumbnail" class="form-control" type="file" >
                                </div>

                                <div class="form-group">
                                    <label for="description" style="color:blue;">Body</label>
                                    <textarea name="body" id="post_body" class="form-control"  row="7" placeholder="Body"></textarea>
                                </div>
                                


                                  
         
         
                           <hr>
         
                    <button type="submit" class="btn btn-primary"  > Save </button>
                   
                </form>
         </div>


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