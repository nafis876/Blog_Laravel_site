@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="card-header">Home Page</div> --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
       @endif
        <div class="col-md-9">
                         <div class="card mb-4">
                                 <div class="card-header">{{$user->name}} Information
                                     
                                 </div>
             
                                 <div class="card-body">
                                     <p>Name                : {{$user->name}}</p>
                                     <p>Email               : {{$user->email}}</p>
                                     <p>Date Of Birth       :
                                    @if ($user->date_of_birth)
                                         
                                    {{$user->date_of_birth}}

                                     @else
                                         Not set date of Birth 
                                     @endif
                                      </p>
                                     <p>Profile Create      : {{$user->created_at->format('Y-m-d')}}</p>
                                     <p>Profile Last Update : {{$user->updated_at->format('Y-m-d')}}</p>
                                 
                                         
                                     
                                     
                                 </div>
                        </div>


                         {{-- Now --}}
                         <h4>Post by {{$user->name}}</h4>
                         @forelse ($user->posts as $post)
                             <div class="card mb-4">
                                  <div class="card-header">
                                      <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                                      
                                      
                                  </div>
        
                                
                              </div>
                             
                         @empty
                            <p ><h4 style="color:red;"> No Post Found</h4> </p>
                             
                         @endforelse
                         
        </div>

        

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Profile Picture</div>

                <div class="card-body">
                    <img src='{{asset("uploads/profile_pic/$user->profile_pic")}}' alt="{{$user->name}} profile picture " class="img-responsive">
                    <a href="/profile/edit" class="btn btn-info btn-sm">Profile Edit</a>

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection