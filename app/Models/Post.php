<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;

/* 
 Get the post's image
 */
public function image(): MorphOne
{
return $this->morphOne(Image::class,'imageable');

}

/** Get all the post's comments */
public function comments(): MorphMany
{
    return $this->morphMany(Comment::class,'commentable');
}
}
