<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts  page</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 style="color: blue;"><em><u><strong> Information About Posts </strong></u></em></h2>
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
            <th>title</th>
            <th>bodey</th>
            <th>thumbnail</th>
            <th>status</th>
            <th>Category</th>
            <th>user</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ $post->thumbnail }}</td>
            <td>{{ $post->status }}</td>
            <td>{{ $post->category_id }}</td>
            <td>{{ $post->user_id }}</td>
            <td>
                {{-- <form action="/posts/{{ $post->id}}/delete" method="POST"> --}}
     
                    {{-- <a class="btn btn-info" href="/posts/{{ $post->id}}/show">Show</a> |
       --}}
                    <a class="btn btn-primary" href="/posts/{{ $post->id}}/edit">Edit</a> |
                    <a  href="/posts/{{ $post->id}}/approve" 
                        class="btn {{($post->status == 1)? 'btn-danger' : 'btn-success'}}">
                     {{($post->status == 1)? 'Unapprove' : 'Approve'}}
                    </a>|
     
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
              <a class="btn btn-info" href="/posts/create"> Create New Product</a>
            </div>
        </div>
    </div>
    
    
</body>
</html>