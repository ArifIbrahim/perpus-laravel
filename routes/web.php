<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[BookController::class,'index']);

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/register', function() {
    return view('register');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/books', [BookController::class,'book']);

Route::get('/main', function() {
    return view('layouts.main');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginProcess']);

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerProcess']);
Route::get('/dashboard', [AdminController::class,'dashboard']);
Route::post('/book-add', [AdminController::class,'bookProgress']);
Route::put('/book-edit-{id}', [AdminController::class,'bookEdit'])->name('bookEdit');
Route::delete('/book-delete-{id}', [AdminController::class,'delete'])->name('delete');

// Route::get('/users',[AdminController::class,'users']);
// Route::post('/users-add',[AdminController::class,'usersProgress']);
Route::resource('/users', UserController::class);


Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::get('/tes',[TesController::class,'tes']);
Route::post('/tes',[TesController::class,'tesProgress']);
Route::put('/tes-edit-{id}',[TesController::class,'tesEdit'])->name('tesEdit');