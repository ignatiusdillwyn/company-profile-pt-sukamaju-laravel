<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\Admin\DashboardController;

Route::get('/home', [WebController::class, 'home'])->name('home');

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


// Content Management System (CMS) Routes
// Route::get('/admin', function () {
//     return redirect()->route('auth.login');
//     // return view('admin.dashboard');
// })->name('admin.dashboard');

// Route::get('/admin/login', function () {
//     return view('auth.login');
// })->name('auth.login');

Route::prefix(env('APP_ADMIN_SECTION', 'admin'))->name('admin.')->group(function () {

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