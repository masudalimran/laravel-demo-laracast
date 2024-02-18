<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class EditPostController extends Controller
{
    public function index()
    {
        if (request('id')) {
            $currentPost = Post::with('category', 'author')->find(request('id'));
            return view('admin-panel.edit-post.index', [
                'currentPost' => $currentPost
            ]);
        }
    }
}
