<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin-panel.adminlogin');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|min:9',
            'password' => 'required|min:3',

        ]);
        return back();
    }
}
