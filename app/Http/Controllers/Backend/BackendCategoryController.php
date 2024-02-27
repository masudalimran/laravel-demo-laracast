<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BackendCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin-panel.backend-category.index', ['categories' => $categories]);
    }
}
