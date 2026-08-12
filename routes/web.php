<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\ConfigController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\SitemapController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('/p/{slug}', [FrontArticleController::class, 'show']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/articles', [FrontArticleController::class, 'index']);
Route::post('/articles/search', [FrontArticleController::class, 'index'])->name('search');

Route::get('category/{slug}', [FrontCategoryController::class, 'index']);
Route::get('all-category', [FrontCategoryController::class, 'allCategory']);
Route::get('about', [HomeController::class, 'about']);

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('article', ArticleController::class);

    Route::resource('/categories', CategoryController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
    // ->middleware('UserAccess:1');

    Route::resource('/users', UserController::class);
    Route::resource('/config', ConfigController::class)->only([
        'index', 'update'
    ]);

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

});

// 🔑 ROUTE AUTHENTICATION (Login, Register, Logout)
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');