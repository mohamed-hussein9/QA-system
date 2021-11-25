<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/posts/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/post/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
Route::get('/posts/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::post('/posts/update/', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

//subcomment
Route::post('/subcomment/store/{id}', [App\Http\Controllers\SubCommentController::class, 'store'])->name('subcomment.store');

//comment
Route::post('/comment/store/{id}', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
