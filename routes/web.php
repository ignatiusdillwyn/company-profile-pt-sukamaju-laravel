<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;


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


// Content Management System (CMS) Routes
Route::get('/admin', function () {
    return redirect()->route('auth.login');
    // return view('cms.dashboard');
})->name('cms.dashboard');

Route::get('/admin/login', function () {
    return view('auth.login');
})->name('auth.login');