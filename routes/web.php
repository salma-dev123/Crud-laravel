<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/ping', fn() => 'pong');

// Routes nommées avec contrôleur
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');

// Mini-routes articles (mockées pour l’instant)
Route::get('/articles', [PageController::class, 'articles'])->name('articles.index');
Route::get('/articles/{slug}', [PageController::class, 'show'])->name('articles.show');

// Page Contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
