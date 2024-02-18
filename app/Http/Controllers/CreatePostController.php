<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function index()
    {
        return view('admin-panel.create-post.create');
    }

    public function store()
    {
        return redirect();
    }
    // if (request('create-post')) {
    //     return view('admin-panel.create-post.create');
    // }

}
