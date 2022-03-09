<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //


    public function store(Post $post){

        request()->validate([
            'body' => 'required|min:3|max:200'
        ]);

        $post->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        // another way to send mail
        // $comment=$post->comments()->create([
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);
        // $suscribers=$comment->post->likes;

        //    

        //     foreach ($suscribers as $suscriber) {

        //         $user=$suscriber->user;
               
        //              Mail::raw('New comment on a post you comment', function($message) use($user) {
        //                 $message->to($user->email, 'Admin')->subject
        //                    ('New comment added');
        //              });

        //     }


        return back()->with('success','successfully comments');
    }

    public function storeLike(Post $post){

        $like=$post->likes()->where('user_id', auth()->id())->first();

        if($like){

            $like->delete();
            return back()->with('success','You Dislike Like This Post  :)');
            //return back()->with('error','You Already Like This Post  :)');
        }

        $post->likes()->create([
            'user_id' => auth()->id()

        ]);
        return back()->with('success','successfully Like this  :)');

    }

    public function storeCommentLike(Comment $comment){

        $like=$comment->likes()->where('user_id', auth()->id())->first();

        if($like){

            $like->delete();
            return back()->with('success','You Dislike This Comment  :)');
            //return back()->with('error','You Already Like This Post  :)');
        }

        $comment->likes()->create([
            'user_id' => auth()->id()

        ]);
        return back()->with('success','You Like this Comment  :)');


    }
}
