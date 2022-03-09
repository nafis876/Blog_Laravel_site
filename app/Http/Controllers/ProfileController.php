<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //

    public function profile(){

        $user=auth()->user();

        return view('profile.view',compact('user'));
    }

    public function edit(){

        $user=auth()->user();

        return view('profile.edit',compact('user'));
    }
    public function update(){



        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' =>'required|date',
            'password' => request('password') ? 'required|string|min:5|confirmed' : '',
            'profile_pic' => 'image'
                
            
        ]);

        $user=auth()->user();

        $user->name=request('name');
        $user->date_of_birth=request('date_of_birth');
        $user->password=\Hash::make(request('password'));


        if(request()->hasFile('profile_pic')){

            // if(\File::exists("uploads/post/$post->thumbnail")){
            //     \File::delete("uploads/post/$post->thumbnail");
            // }

            $file = request()->file('profile_pic')->getClientOriginalName();
            $ext = request()->file('profile_pic')->getClientOriginalExtension();
            $file_name=$user->id .'.'. $ext;
            request()->file('profile_pic')->move('uploads/profile_pic',$file_name);

            $user->profile_pic =$file_name;

            $user->save();

            return redirect('/profile')->with('success','profile update successfully');
            
        }
        


    }
}
