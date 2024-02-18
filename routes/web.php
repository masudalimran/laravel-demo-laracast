<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagePostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PostController::class, "index"])->name("home");

Route::get('/posts/{post:id}', [PostController::class, "showSinglePost"])->where('post', '[0-9]+')->name("single-post");
Route::post('/post/{post:id}/comment', [PostCommentsController::class, 'store'])->middleware('auth')->where('post', '[0-9]+')->name('store-comment');

Route::get("/categories/{category:name}", [PostController::class, "showPostByCategory"])->name("category");

Route::get("/register", [RegistrationController::class, "create"])->middleware('guest')->name('register-page');
Route::post("/register", [RegistrationController::class, "store"])->middleware('guest')->name('register-user');

Route::get("/login", [LoginController::class, "create"])->middleware('guest')->name('login-page');
Route::post("/login", [LoginController::class, "store"])->middleware('guest')->name('login-user');
Route::post("/logout", [SessionController::class, "destroy"])->middleware('auth');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter');


Route::prefix('/{adminRoute}')->middleware('admin')->group(function () {
    Route::get('/', [AdminPanelController::class, 'index'])->name('admin-login');
    Route::post('/', [AdminPanelController::class, 'store'])->name('admin-login');
    Route::post('/logout', [AdminPanelController::class, 'destroy'])->name('admin-login');
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::prefix('post')->group(function () {
            Route::get('/', [ManagePostController::class, 'index'])->name('post-page');
            Route::get('/create', [CreatePostController::class, 'index'])->name('create-post-page');
            Route::post('/create', [CreatePostController::class, 'store'])->name('create-post');
            Route::get('/edit', [EditPostController::class, 'index'])->name('edit-post-page');
        });
    });
});

// Route::get("/author/{author}", function (User $author) {
//     Illuminate\Support\Facades\DB::listen(fn($query) => logger($query->sql));
//     return view('user', ['posts' => $author->posts->load('category', 'author'), "authorName" => $author->name]);
// });
