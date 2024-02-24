<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BackendLoginController extends Controller
{
    public function index()
    {
        return view('admin-panel.admin-login');
    }

    public function store()
    {
        $attributes = request()->validate(
            [
                'email' => 'required|min:9|exists:users,email',
                'password' => 'required|min:3',

            ],
            [
                'email.exists' => 'Incorrect Email! This email does not exist'
            ]
        );

        $attributes['isAdmin'] = 1;

        $errors = [];
        if (auth()->attempt($attributes, true)) {
            session()->regenerate();
            return back()->with('success', "Alert! Alert! An admin (" . auth()->user()->name . ") just entered the room");
        } else {
            $user = User::where('email', request('email'))->first();
            if (!$user) {
                $errors['email'] = 'Incorrect Email! This email does not exist';
            } else if (!Hash::check(request('password'), $user->password)) {
                $errors['password'] = 'Incorrect Password!';
            } else if ($user && $user->isAdmin !== 1) {
                $errors['email'] = 'This email does not have admin permissions';
            }
        }

        return back()->withInput()->withErrors($errors);
    }

    public function destroy()
    {
        $username = auth()->user()->name;
        auth()->logout();

        return redirect('/')->with('error', "Hei $username, You logged out successfully!");
    }
}
