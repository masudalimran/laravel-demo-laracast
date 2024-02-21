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
        return view('admin-panel.backend-post.index', $data);
    }

    public function create()
    {
        return view('admin-panel.backend-post.create', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|min:5|max:255',
            'excerpt' => 'required|min:5|max:255|unique:posts,excerpt',
            'body' => 'required|min:5|max:3000',
            'published_at' => 'date',
            'category_id' => 'required|exists:categories,id'
        ]);

        $attributes['user_id'] = auth()->id();

        if (request()->hasFile('img')) {
            $attributes['imgUrl'] = uploadToPublic('blog-img', request()->file('img'));
        } else {
            $randomImageGenerate = "/img/blogs/blog-" . mt_rand(1, 51) . ".jpg";
            $attributes['imgUrl'] = $randomImageGenerate;
        }

        $post = Post::create($attributes);

        if (request('recreate') === 'on') {
            return back()->with('success', "Post " . $post->title . " has been created");
        }
        return redirect()->route('backend-post')->with('success', "Post " . $post->title . " has been created");
    }

    public function edit(Post $post)
    {
        return view('admin-panel.backend-post.edit', [
            'currentPost' => $post,
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'img' => 'image',
            'title' => 'required|min:5|max:255',
            'excerpt' => 'required|min:5|max:255|unique:posts,excerpt,' . $post->id,
            'body' => 'required|min:5|max:3000',
            'published_at' => 'date',
            'category_id' => 'required|exists:categories,id'

        ]);
        if (request()->hasFile('img')) {
            $attributes['imgUrl'] = uploadToPublic('blog-img', request()->file('img'));
        }

        $post->update($attributes);

        return redirect()->route('backend-post')->with('warning', "Post " . $post->title . " has been updated");
    }

    public function destroy(Post $post)
    {
        $isDeleted = $post->delete();
        if ($isDeleted) {
            customUnlinkFile($post->imgUrl);
        }
        return redirect()->route('backend-post')->with('error', "Post " . $post->title . " has been deleted");
    }
}
