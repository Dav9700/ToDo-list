<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');
//Route::post('/loging', [App\Http\Controllers\MainController::class, 'login'])->name('login');
//Route::post('/register', [App\Http\Controllers\MainController::class, 'register'])->name('register');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('get-logout');

Route::resource('/person/tasks',App\Http\Controllers\TaskController::class)->middleware('auth');
