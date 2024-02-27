<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class BackendPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'author')->orderByDesc('id')->paginate(15);

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
        $attributes = $this->validatePost();

        $attributes['user_id'] = auth()->id();

        if (request()->hasFile('img')) {
            $attributes['imgUrl'] = uploadToPublic('blog-img', request()->file('img'));
        } else {
            $attributes['imgUrl'] = randomPostImage();
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
        $attributes = $this->validatePost($post);

        if (request()->hasFile('img')) {
            $attributes['imgUrl'] = uploadToPublic('blog-img', request()->file('img'));
        } else if (request('prevImg')) {
            $attributes['imgUrl'] = request('prevImg');
        } else {
            $attributes['imgUrl'] = randomPostImage();
            customUnlinkFile($post->imgUrl);
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

    private function validatePost(?Post $post = null)
    {
        $post ??= new Post();
        return request()->validate([
            'img' => 'image',
            'title' => 'required|min:5|max:255',
            'excerpt' => 'required|min:5|max:255|unique:posts,excerpt,' . $post->id,
            'body' => 'required|min:5|max:3000',
            'published_at' => 'date',
            'category_id' => 'required|exists:categories,id'

        ]);
    }
}
