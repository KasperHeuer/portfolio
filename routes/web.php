<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
Route::get('/about', AboutController::class)->name('about');
Route::get('/projects', ProjectController::class)->name('project');
Route::get('/contact', ContactController::class)->name('contact');
Route::post('/contact', ContactController::class)->name('contact.submit');