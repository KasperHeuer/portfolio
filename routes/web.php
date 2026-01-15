<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);


Route::get('/about', AboutController::class);

Route::get('/projects', function () {
    return view('pages.projects');
});

Route::get('contact', function () {
    return view('pages.contact');
});

