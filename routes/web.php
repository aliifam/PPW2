<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Email;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Web Routes
|---------------    -----------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::get('posts/{id}/delete', [PostController::class, 'destroy']);

Auth::routes([
    'reset' => false,
]);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/tugas8', function () {
    return view('tugas8');
})->middleware('auth');

Route::get('/send-email',function(){
    $data = [
    'name' => 'Aliif Arief',
    'body' => 'Testing Kirim Email ya'
    ];

    Mail::to('aliif.arief.m@gmail.com')->send(new SendEmail($data));

    dd("Email Berhasil dikirim.");
});

Route::get('/send-email', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status == Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::resource('gallery', GalleryController::class);

Route::get('gallery2', function(){
    return view('gallery2');
});