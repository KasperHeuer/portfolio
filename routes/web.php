<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/projects', function () {
    return view('pages.projects');
});

Route::get('contact', function () {
    return view('pages.contact');
});


Route::get('/about', [ContactController::class, 'index'])->name('about');
Route::post('/about', [ContactController::class, 'send'])->name('contact.send');
