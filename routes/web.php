<?php


use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendDashboardController;
use App\Http\Controllers\Backend\BackendLoginController;
use App\Http\Controllers\Backend\BackendPostController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\RegistrationController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PostController::class, "index"])->name("home");

Route::get('/posts/{post:id}', [PostController::class, "show"])->where('post', '[0-9]+')->name("post-show");
Route::post('/post/{post:id}/comment', [CommentController::class, 'store'])->middleware('auth')->where('post', '[0-9]+')->name('comment-store');

Route::get("/categories/{category:name}", [CategoryController::class, "index"])->name("post-show-by-category");

Route::get("/register", [RegistrationController::class, "create"])->middleware('guest')->name('registration');
Route::post("/register", [RegistrationController::class, "store"])->middleware('guest')->name('registration-store');

Route::get("/login", [LoginController::class, "create"])->middleware('guest')->name('login');
Route::post("/login", [LoginController::class, "store"])->middleware('guest')->name('login-store');
Route::post("/logout", [LoginController::class, "destroy"])->middleware('auth')->name('logout');

Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');


Route::prefix('/' . getAdminUrl())->middleware('admin')->group(function () {
    Route::get('/', [BackendLoginController::class, 'index'])->name('backend-login');
    Route::post('/', [BackendLoginController::class, 'store'])->name('backend-login-store');
    Route::post('/logout', [BackendLoginController::class, 'destroy'])->name('backend-logout');
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [BackendDashboardController::class, 'index'])->name('backend-dashboard');
        Route::patch('/admin-url/{admin_url:id}', [BackendDashboardController::class, 'update'])->name('backend-dashboard-update');
        Route::prefix('posts')->group(function () {
            Route::get('/', [BackendPostController::class, 'index'])->name('backend-post');
            Route::get('/create', [BackendPostController::class, 'create'])->name('backend-post-create');
            Route::post('/', [BackendPostController::class, 'store'])->name('backend-post-store');
            Route::get('/{post:id}/edit/', [BackendPostController::class, 'edit'])->name('backend-post-edit');
            Route::patch('/{post:id}', [BackendPostController::class, 'update'])->name('backend-post-update');
            Route::delete('/{post:id}', [BackendPostController::class, 'destroy'])->name('backend-post-destroy');
        });
        Route::prefix('categories')->group(function () {
            Route::get('/', [BackendCategoryController::class, 'index'])->name('backend-category');
        });
    });
});

// Route::get("/author/{author}", function (User $author) {
//     Illuminate\Support\Facades\DB::listen(fn($query) => logger($query->sql));
//     return view('user', ['posts' => $author->posts->load('category', 'author'), "authorName" => $author->name]);
// });
