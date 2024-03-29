<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/', [QuestionController::class, 'index'])->name('home');
//Route::get('/home', [QuestionController::class, 'index'])->name('home');
Route::post('/store', [QuestionController::class, 'store'])->name('store');
Route::get('/edit/{id}/{page}', [QuestionController::class, 'edit'])->name('edit');
Route::post('/update/{id}/{page}', [QuestionController::class, 'update'])->name('update');
Route::get('/delete/{id}', [QuestionController::class, 'delete'])->name('delete');