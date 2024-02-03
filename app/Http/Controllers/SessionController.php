<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function destroy()
    {
        $username = auth()->user()->name;
        auth()->logout();

        return back()->with('error', "Hei $username, You logged out successfully!");

    }
}
