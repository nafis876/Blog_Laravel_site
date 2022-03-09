<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }


    public function comments(){

        return $this->hasMany(Comment::class);

    }

    public function likes(){

        return $this->morphMany(Like::class,'likeable');
    }

    public function thumbnail_path(){

        return "/uploads/post/$this->thumbnail";
    }


    public function LikeByCirrentUser(){

        return $this->likes()->where('user_id',auth()->id())->exists();
    }

}
