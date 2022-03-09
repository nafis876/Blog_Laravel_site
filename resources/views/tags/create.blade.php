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
         <div class="container">
            <h1 style="color:red;text-align:center;">Create New Tags Here!</h1>
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
                <form action="/tags" method="post">
                   @csrf
         
                         <div class="form-group">
                             <label for="name"style="color:red;">Tags Name</label>
                             <input type="text" name="name" id="name" class="form-control" placeholder="Categories Name">
                         </div>
         
         
                              <div class="form-group">
                                  <label for="description" style="color:blue;">Tags description</label>
                                  <textarea name="description" id="description" class="form-control" col="10" row="5" placeholder="description"></textarea>
                              </div>
         
                 
         
                                  
         
         
                           <hr>
         
                    <button type="submit" class="btn btn-primary"  > Save </button>
                   
                </form>
         </div>
    
         <script>
            CKEDITOR.replace( 'description' );
        </script>
</body>
</html>