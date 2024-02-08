<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ManagePostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'author')->orderByDesc('id')->paginate(6);

        if (request('create-post')) {
            return view('admin-panel.CreatePost');
        }
        if (request('edit-post')) {
            $currentPost = Post::with('category', 'author')->find(request('edit-post'));
            return view('admin-panel.EditPost', [
                'currentPost' => $currentPost
            ]);
        }

        $data = [
            'posts' => $posts
        ];

        return view('admin-panel.ManagePost', $data);
    }
}
