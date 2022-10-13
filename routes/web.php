<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatkulController;

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
    return view('rumah', ["title" => 
    "Home"]);
});

Route::get('/inisialisasi', function (){
    return view('inisialisasi', ["title" => 
    "Inisialisasi"]);
});

Route::get('/matakuliah', function (){
    return view('matakuliah', [MatkulController::class, 'index']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
