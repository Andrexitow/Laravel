<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

Route::get('/', HomeController::class)->name('home');

Route::get('/posts',  [PostController::class, 'index'])->name('public');
Route::get('/contact', [PostController::class, 'index_contac'])->name('contacto');


Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/login', [RegisterController::class, 'login_validate'])->name('login_validate');

Route::get('/register', [RegisterController::class, 'singup'])->name('singup');
Route::post('/register', [RegisterController::class, 'singup_validate'])->name('singupvalidate');

Route::get('/posts/create', [PostController::class, 'create']); 
Route::get('/posts/{post}', [PostController::class, 'show'])->name('show'); 
