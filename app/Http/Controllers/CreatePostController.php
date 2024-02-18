<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function index()
    {
        return view('admin-panel.create-post.create', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function store()
    {
        $adminPath = 'admin';
        $attributes = request()->validate([
            'title' => 'required|min:5|max:255',
            'excerpt' => 'required|min:5|max:255|unique:posts,excerpt',
            'body' => 'required|min:5|max:3000',
            'published_at' => '',
            'category_id' => 'required|exists:categories,id'
        ]);
        $attributes['user_id'] = auth()->id();
        $randomImageGenerate = "/img/blogs/blog-" . mt_rand(1, 51) . ".jpg";
        $attributes['imgUrl'] = $randomImageGenerate;
        $post = Post::create($attributes);

        if (request('recreate') === 'on') {
            return back()->with('success', "Post " . $post->title . " has been created");
        }
        return redirect()->route('post-page', ['adminRoute' => $adminPath])->with('success', "Post " . $post->title . " has been created");
    }

}
