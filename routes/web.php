<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;

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

        Route::get('/users', [UserController::class, 'indexRender'])->name('user-index');

        // Route Article list 
        Route::get('/article', [ArticleController::class, 'indexRender'])->name('article-index');
        
        // Route Create
        Route::get('/article/create', [ArticleController::class, 'createRender'])->name('article-create');
        Route::post('/article/save', [ArticleController::class, 'createHandle'])->name('article-save');

        // Route Edit
        Route::get('/article/edit', [ArticleController::class, 'editRender'])->name('article-edit');
        Route::post('/article/update', [ArticleController::class, 'editHandle'])->name('article-update');

        // Route Delete
        Route::get('/article/delete/{id}', [ArticleController::class, 'deleteHandle'])->name('article-delete');

        // Route Contacts list
        Route::get('/contacts', [ContactController::class, 'contactList'])->name('contact-list');
        Route::post('/contacts/{id}/read', [ContactController::class, 'markAsRead'])->name('contact-read');

        // Route Users list
        Route::get('/users', [UserController::class, 'indexRender'])->name('user-index-cms');

        // Route Create User
        Route::get('/users/create', [UserController::class, 'createRender'])->name('user-create');
        Route::post('/users/save', [UserController::class, 'createHandle'])->name('user-save');

        // Route Edit User
        Route::get('/users/edit/{id}', [UserController::class, 'editRender'])->name('user-edit');
        Route::post('/users/update/{id}', [UserController::class, 'editHandle'])->name('user-update');

        // Route Delete User
        Route::get('/users/delete/{id}', [UserController::class, 'deleteHandle'])->name('user-delete'); 

    });
});