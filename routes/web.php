<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\collatzController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExponentsController;
use App\Http\Controllers\FactorialController;
use App\Http\Controllers\FibonacciController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MathHomeController;
use App\Http\Controllers\PerfectNumberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SurfaceController;
use App\Http\Controllers\WisdomController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
Route::get('/about', AboutController::class)->name('about');
Route::get('/projects', ProjectController::class)->name('project');
Route::get('/contact', ContactController::class)->name('contact');
Route::post('/contact', ContactController::class)->name('contact.submit');

Route::get('/math/home', MathHomeController::class)->name('math');

Route::get('/math/collatz-sequence', CollatzController::class)->name('collatz');
Route::post('/math/collatz-sequence', CollatzController::class)->name('collatz.submit');

Route::get('/math/factorial', FactorialController::class)->name('factorial');
Route::post('/math/factorial', FactorialController::class)->name('factoral.submit');

Route::get('/math/perfect-numbers', PerfectNumberController::class)->name('perfect-numers');
Route::post('/math/perfect-numbers', PerfectNumberController::class)->name('perfect-numers.submit');

Route::get('/math/surface-area', SurfaceController::class)->name('surface');
Route::post('/math/surface-area', SurfaceController::class)->name('surface.submit');

Route::get('/math/wisdom-of-the-crowd', WisdomController::class)->name('wisdom-of-the-crowd');
Route::post('/math/wisdom-of-the-crowd', WisdomController::class)->name('wisdom-of-the-crowd-submit');

Route::get('/math/fibonacci-sequence', FibonacciController::class)->name('fibonacci');
Route::post('/math/fibonacci-sequence', FibonacciController::class)->name('fibonacci.submit');

Route::get('/math/exponents', ExponentsController::class)->name('exponents');
