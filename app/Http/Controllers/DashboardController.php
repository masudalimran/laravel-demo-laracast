<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Subscribers;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::all()->count();
        $somePosts = Post::inRandomOrder()->get()->take(6);

        $totalCategories = Category::all()->count();
        $someCategories = Category::inRandomOrder()->get()->take(6);

        $totalUsers = User::all()->count();
        $someUsers = User::inRandomOrder()->get()->take(6);

        $totalSubscribers = Subscribers::all()->count();
        $someSubscribers = Subscribers::inRandomOrder()->get()->take(6);

        $data = [
            'totalPosts' => $totalPosts,
            'somePosts' => $somePosts,

            'totalCategories' => $totalCategories,
            'someCategories' => $someCategories,

            'totalUsers' => $totalUsers,
            'someUsers' => $someUsers,

            'totalSubscribers' => $totalSubscribers,
            'someSubscribers' => $someSubscribers
        ];

        return view('admin-panel.Dashboard', $data);
    }
}
