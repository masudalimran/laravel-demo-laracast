<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'comment' => 'required|min:10'
        ], [
            'comment.min' => 'Too short for a comment, Try 10+ characters'
        ]);


        $post->comments()->create([
            'user_id' => request()->user()->id,
            'comment' => request('comment')
        ]);

        return back()->with('success', "Your comment has been added!")->with('created', '');
    }
}
