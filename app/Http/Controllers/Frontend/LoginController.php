<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }
    public function store()
    {
        $attributes = request()->validate(
            [
                'email' => 'required|email|max:150|min:3|exists:users,email',
                'password' => 'required|min:3|max:100'
            ],
            [
                'email.exists' => 'Incorrect Email! This email does not exist'
            ]
        );

        $errors = [];
        if (auth()->attempt($attributes, request('remember') === 'on' ? true : false)) {
            session()->regenerate();
            return redirect("/")->with('success', "Welcome Back, Mr. " . auth()->user()->name);
        } else {
            $user = User::where('email', request('email'))->first();
            if (!$user)
                $errors['email'] = 'Incorrect Email! This email does not exist';
            else if (!Hash::check(request('password'), $user->password))
                $errors['password'] = 'Incorrect Password!';
        }

        return back()->withInput()->withErrors($errors);
    }

    public function destroy()
    {
        $username = auth()->user()->name;
        auth()->logout();

        return back()->with('error', "Hei $username, You logged out successfully!");

    }
}
