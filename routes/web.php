<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return view('front.index');
});

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\FrontController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/service', [FrontController::class, 'service'])->name('service');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
include('admin.php');
