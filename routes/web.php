<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubmissionController;

Route::get('/', HomeController::class)->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login_validate'])->name('login_validate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/settings',[SettingsController::class, 'index'])->name('index.settings');
Route::put('/settings',[SettingsController::class, 'update'])->name('update.settings');

Route::get('/register', [RegisterController::class, 'index'])->name('singup');
Route::post('/register', [RegisterController::class, 'signup_validate'])->name('singupvalidate');


Route::get('/posts',  [PostController::class, 'index'])->name('public');
Route::get('/contact', [PostController::class, 'index_contac'])->name('contacto');



Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('show');

Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
Route::get('/courses/{course}/publications', [CourseController::class, 'show'])->name('course.show');
Route::get('/courses/{course}/publications/{publication}', [CourseController::class, 'publication'])->name('course.publication');
Route::post('/courses/{course}/publications/{publication}/submit', [SubmissionController::class, 'store'])->name('submission.store')->middleware('auth');

Route::get('/course/create', [CourseController::class, 'index_create'])->name('course.create');
Route::post('/course/create', [CourseController::class, 'store'])->name('course.store');

Route::get('/course/edit/{edit}', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/course/{id}/update', [CourseController::class, 'update'])->name('course.update');


// Route::post('/courses/{course}/publications/{publication}/submit', [SubmissionController::class, 'store'])->name('submission.store');
