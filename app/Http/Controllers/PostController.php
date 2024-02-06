<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

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

    public function showSinglePost(Post $post)
    {
        return view('post', [
            'post' => Post::with('category', 'author', 'comments')->find($post->id),
            "posts" => Post::with("category", "author")->inRandomOrder()->get(),
        ]);
    }

    public function showPostByCategory(Category $category)
    {
        $posts = Post::with("category", "author");
        $postsByCategory = $posts->where("category_id", $category->id)->orderBy('title')->get();
        $directedPosts = $posts->filter($category->id);
        if (request('search')) {
            $directedPosts = $directedPosts->get();
        } else
            $directedPosts = $directedPosts->paginate(5);
        return view('category', [
            "directedPosts" => $directedPosts,
            "postsByCategory" => $postsByCategory,
            "currentCategory" => $category,
        ]);
    }

}
