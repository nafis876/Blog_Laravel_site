<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tags  page</title>
</head>
<body>
    <h1 style="color:red;text-align:center;">Update Tags Information Here!</h1>
    <form action="/tags/{{ $tag->id }}/update" method="POST" > 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $tag->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>description:</strong>
                    <textarea type="text" id="description" name="description"  class="form-control" placeholder="description">{{ $tag->description }}</textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
     
    </form>

    <script>
        CKEDITOR.replace( 'description' );
    </script>
    
</body>
</html>