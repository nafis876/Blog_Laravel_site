<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected static function boot(){

        parent::boot();

        self::created(function($comment){

            $suscribers=$comment->post->likes;

            $data = array('name'=>"user name");

            foreach ($suscribers as $suscriber) {

                $user=$suscriber->user;
               
                     Mail::raw('New comment on a post you comment', function($message) use($user) {
                        $message->to($user->email, 'Admin')->subject
                           ('New comment added');
                     });

            }
        });
    }

    public function owner(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function post(){

        return $this->belongsTo(Post::class);
    }

    public function likes(){

        return $this->morphMany(Like::class,'likeable');
    }

    public function LikeByCirrentUser(){

        return $this->likes()->where('user_id',auth()->id())->exists();
    }
}
