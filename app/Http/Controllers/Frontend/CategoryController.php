<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
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
