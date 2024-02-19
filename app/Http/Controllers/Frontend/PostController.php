<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $directedPosts = Post::filter();
        if (request('search')) {
            $directedPosts = $directedPosts->get();
        } else
            $directedPosts = $directedPosts->paginate(5);
        return view(
            'home',
            [
                "posts" => Post::with("category", "author")->inRandomOrder()->get(),
                "directedPosts" => $directedPosts,
            ]
        );
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => Post::with('category', 'author', 'comments')->find($post->id),
            "posts" => Post::with("category", "author")->inRandomOrder()->get(),
        ]);
    }


}
