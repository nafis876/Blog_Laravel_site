<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories  page</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 style="color: blue;"><em><u><strong> Information About Product </strong></u></em></h2>
            </div>
        </div>
    </div>
    <hr>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered" style="background-color: beige;">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categoryes as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                {{-- <form action="/categories/{{ $category->id}}/delete" method="POST"> --}}
     
                    <a class="btn btn-info" href="/categories/{{ $category->id}}/show">Show</a> |
      
                    <a class="btn btn-primary" href="/categories/{{ $category->id}}/edit">Edit</a> |
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                {{-- </form> --}}
            </td>
        </tr>
        @endforeach
    </table>


    <hr>
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="text-center">
              <a class="btn btn-info" href="/categories/create"> Create New Product</a>
            </div>
        </div>
    </div>
    
    
</body>
</html>