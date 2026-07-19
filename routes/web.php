<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/blog/{slug}', [WebController::class, 'blog'])->name('blog');
Route::get('/service/{slug}', [WebController::class, 'service'])->name('service');
Route::get('/about', [WebController::class, 'about'])->name('about');
