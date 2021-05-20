<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::get('/posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.delete');
Route::get('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/tags/{id}/delete', [TagController::class, 'destroy'])->name('tags.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

