<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAuthController;

// Home page 
Route::get('/', [PostController::class, 'index'])->name('home');

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Posts routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Website auth (users)
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{id}/comments', [PostController::class, 'storeComment'])->name('posts.comments.store');
});

// Admin auth 
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Dashboard (admins only)
Route::middleware('auth:admin')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    
    Route::get('/categories', [DashboardController::class, 'categories'])->name('categories');
    Route::post('/categories', [DashboardController::class, 'storeCategory'])->name('categories.store');
    Route::delete('/categories/{id}', [DashboardController::class, 'deleteCategory'])->name('categories.delete');
    
    Route::get('/tags', [DashboardController::class, 'tags'])->name('tags');
    Route::post('/tags', [DashboardController::class, 'storeTag'])->name('tags.store');
    Route::delete('/tags/{id}', [DashboardController::class, 'deleteTag'])->name('tags.delete');
    
    Route::get('/posts', [DashboardController::class, 'posts'])->name('posts');
    Route::delete('/posts/{id}', [DashboardController::class, 'deletePost'])->name('posts.delete');
});
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
