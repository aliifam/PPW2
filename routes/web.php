<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/halo/{name}', function($nama){
//     return '<h1>Halo ' . $nama . '!</h1>';
// });

// //dengan default param
// Route::get('woi/{nama?}', function($nama = 'tanpa nama'){
//     return '<h1>Woi ' . $nama . '!</h1>';
// });

// //view
// Route::get('/halo-dunia', function(){
//     return view('halo-dunia');
// });

// //kirim data ke blade
// Route::get('/halo-blade', function(){
//     return view('halo-blade', ["datanih" => 
//     "contoh data"]);
// });

// Route::get('/home', function(){
//     return view('home');
// });

Route::get('/', function(){
    return view('home', ["title" => 
    "Home"]);
});

Route::get('/about', function(){
    return view('about', ["title" => 
    "About"]);
});

Route::get('/education', function(){
    return view('education', ["title" => 
    "Education",
    "sekolah" => [
        "univ" => [
            "nama" => "Universitas Gadjah Mada",
            "tahun" => "2021 - present"
        ],
        "sma" => [
            "nama" => "SMAIT Al - Kahfi",
            "tahun" => "2018 - 2021"
        ],
        "smp" => [
            "nama" => "SMPIT Al - Kahfi",
            "tahun" => "2015 - 2018"
        ]
    ]]);
});

Route::get('/projects', function(){
    return view('projects', ["title" => 
    "Projects"]);
});

