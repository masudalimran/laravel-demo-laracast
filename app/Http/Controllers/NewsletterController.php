<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email|min:5|unique:subscribers,email'
        ], [
            'email.unique' => 'This email already exist as a subscriber'
        ]);

        Subscribers::create($attributes);

        return back()->with('success', 'You have successfully subscribed to our newsletter')->with('subscribed', '');
    }
}
