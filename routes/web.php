<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/cours', function () {
    return view('cours');
})->name('cours');

Route::get('/login', function () {
    return view('authusers');
})->name('auth');