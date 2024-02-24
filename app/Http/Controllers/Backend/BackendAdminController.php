<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdminUrl;
use App\Models\Post;
use Illuminate\Http\Request;

class BackendAdminController extends Controller
{
    public function index(): string
    {
        return AdminUrl::first()->url;
    }

}
