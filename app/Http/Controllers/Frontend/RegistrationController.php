<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate(
            [
                'name' => 'required|max:60|min:3',
                'email' => 'required|email|max:150|min:3|unique:users,email',
                'password' => 'required|min:3|max:200'
            ]
        );

        $user = User::create($attributes);

        auth()->login($user);

        return redirect("/")->with('success', "Hello " . $attributes['name'] . ", You have registered successfully");
    }
}
