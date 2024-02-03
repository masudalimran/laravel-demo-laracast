<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        // Add a comment to the given post
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
