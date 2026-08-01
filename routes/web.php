<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [WebController::class, 'home'])->name('home');

// Blog Page
Route::get('/blog', [WebController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [WebController::class, 'blogDetail'])->name('blog.detail');

// Service Page
Route::get('/service', [WebController::class, 'service'])->name('service');
Route::get('/service/{slug}', [WebController::class, 'serviceDetail'])->name('service.detail');

// About Page
Route::get('/about', [WebController::class, 'about'])->name('about');

// Contact us Page
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::post('/contact/save', [WebController::class, 'contactHandle'])->name('contact.save');


Route::prefix(env('APP_ADMIN_SECTION', 'admin'))->name('admin.')->group(function () {

    Route::get('/register', [AuthController::class, 'registerRender'])->name('register');
    Route::post('/register', [AuthController::class, 'registerHandle'])->name('register.handle');

    // Authentication - HARUS bisa diakses SEBELUM login, jadi TIDAK
    // dibungkus middleware 'admin'
    Route::get('/login', [AuthController::class, 'loginRender'])->name('login');
    Route::post('/login', [AuthController::class, 'loginHandle'])->name('login.handle');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Halaman yang WAJIB login -> dibungkus middleware 'admin'
    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
});