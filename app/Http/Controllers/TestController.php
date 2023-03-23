<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;



class TestController extends Controller
{
    public function show()
    {
     $post =Post::find(1);
     $image=$post->image;
     return $image;
    }
    public function showUser()
    {
        $user= User::find(1);
        $image=$user->image;
        return $image;
    }

    public function getImageParent()
    {

        $image=Image::find(1);
        $imageable=$image->imageable;
        return $imageable;
    }

    //Show all the post's comments in a route
    public function showPostComments()
    {
        $post =Post::find(1);
        foreach($post->comments as $comment)
        {
            $comments[]= $comment;
        }
        return $comments;
    }

    //Show the parent of the polymorphic child model  (post)
    public function showCommmentParent()
    {        
        $comment=Comment::find(1);
       return $comment->commentable;
    }

     //Show all the post's comments in a route
     public function showVideoComments()
     {
         $video =Video::find(1);
         foreach($video->comments as $video)
         {
            $videos[]= $video;
         }
         return $videos;
     }
}
