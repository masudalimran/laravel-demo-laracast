<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\AdminUrl;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subscribers;
use App\Models\User;
use Illuminate\Http\Request;

class BackendDashboardController extends Controller
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

        return view('admin-panel.dashboard', $data);
    }

    public function update(AdminUrl $adminUrl)
    {
        $attributes = request()->validate([
            'url' => 'required|min:5|unique:admin_urls,url'
        ], [
            'url.unique' => '\'' . request('url') . '\'' . ' already set as :attribute'
        ]);

        $adminUrl->update($attributes);
        $newAdminUrl = '/' . $adminUrl->url . '/dashboard';
        return redirect($newAdminUrl)->with('warning', "Admin Url Changed to '" . $adminUrl->url . "'");
    }
}
