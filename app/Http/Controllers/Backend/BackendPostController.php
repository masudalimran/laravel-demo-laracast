<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class BackendPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'author')->orderByDesc('id')->paginate(6);

        $data = [
            'posts' => $posts
        ];
        return view('admin-panel.manage-post.index', $data);
    }

    public function create()
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

    public function edit()
    {
        if (request('id')) {
            $currentPost = Post::with('category', 'author')->find(request('id'));
            return view('admin-panel.edit-post.index', [
                'currentPost' => $currentPost,
                'categories' => Category::orderBy('name')->get()
            ]);
        }
    }
}
