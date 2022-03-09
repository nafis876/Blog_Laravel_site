<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>users  page</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2 style="color: blue;"><em><u><strong> Information About Users </strong></u></em></h2>
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
            <th>Email</th>
            <th>Sign up date</th>
            <th>Uesr type</th>       
         </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>

            <td>
                @if( $user->user_type=="admin")
                   {{"admin"}}
                @elseif($user->user_type=="modarator")
                   {{"modarator"}}
                   @elseif($user->user_type=="user")
                   {{"user"}}
                @endif
            </td>

            
        </tr>
        @endforeach
    </table>


    {{-- <hr>
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="text-center">
              <a class="btn btn-info" href="/categories/create"> Create New Product</a>
            </div>
        </div>
    </div> --}}
    
    
</body>
</html>