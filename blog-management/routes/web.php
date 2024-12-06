<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

// Redirect root URL to blog posts index
Route::get('/', function () {
    return redirect()->route('blog-posts.index');
});

// Resource route for blog posts
Route::resource('blog-posts', BlogPostController::class);
