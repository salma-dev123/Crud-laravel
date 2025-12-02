<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn() => redirect()->route('articles.index'));

Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class)->except(['show']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');