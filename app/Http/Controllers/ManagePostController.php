<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ManagePostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'author')->orderByDesc('id')->paginate(6);

        $data = [
            'posts' => $posts
        ];
        return view('admin-panel.manage-post.index', $data);
    }
}
