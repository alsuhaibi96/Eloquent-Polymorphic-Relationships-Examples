<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    /** Get all the post's comments */
public function comments(): MorphMany
{
    return $this->morphMany(Comment::class,'commentable');
}
}
