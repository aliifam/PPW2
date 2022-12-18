<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;

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





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');



Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::patch('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');

Route::post('reply/store', [CommentController::class, 'replyStore'])->name('reply.store');

Route::get('/user/@{username}', [UserController::class, 'show'])->name('user.show');
Route::get('/users', [UserController::class, 'index'])->name('user.index');

Route::post('/like-post/{post}', [PostController::class, 'like'])->name('post.like');
Route::post('/unlike-post/{post}', [PostController::class, 'unlike'])->name('post.unlike');

Route::get('/send-email', [SendEmailController::class, 'index'])->name('send.email');
Route::post('/send-email', [SendEmailController::class, 'send'])->name('send.email');

Route::get('/userswithapi', function () {
    return view('user.indexapi');
})->name('user.indexapi');


require __DIR__.'/auth.php';
