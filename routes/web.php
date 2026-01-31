<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AboutController,
    blackjackController,
    CasinoController,
    CollatzController,
    ContactController,
    DashboardController,
    ExponentsController,
    FactorialController,
    FibonacciController,
    IndexController,
    MathHomeController,
    PerfectNumberController,
    ProjectController,
    SurfaceController,
    WisdomController
};

Route::get('/', IndexController::class)->name('index');
Route::get('/about', AboutController::class)->name('about');
Route::get('/projects', ProjectController::class)->name('projects');

Route::get('/contact', ContactController::class)->name('contact');
Route::post('/contact', ContactController::class)->name('contact.submit');

Route::prefix('math')->group(function () {

    Route::get('/home', MathHomeController::class)->name('math');

    Route::match(['get', 'post'], '/collatz-sequence', CollatzController::class)
        ->name('collatz');

    Route::match(['get', 'post'], '/factorial', FactorialController::class)
        ->name('factorial');

    Route::match(['get', 'post'], '/perfect-numbers', PerfectNumberController::class)
        ->name('perfect-numbers');

    Route::match(['get', 'post'], '/surface-area', SurfaceController::class)
        ->name('surface');

    Route::match(['get', 'post'], '/wisdom-of-the-crowd', WisdomController::class)
        ->name('wisdom-of-the-crowd');

    Route::match(['get', 'post'], '/fibonacci-sequence', FibonacciController::class)
        ->name('fibonacci');

    Route::match(['get', 'post'], '/exponents', ExponentsController::class)
        ->name('exponents');
});

Route::prefix('casino')->group(function () {
    Route::get('/home', [CasinoController::class, 'index'])->name('casino');
    Route::get('/blackjack', [blackjackController::class, 'play'])->name('blackjack');
    Route::get('/blackjack/start', [blackjackController::class, 'start'])->name('blackjack.start');
    Route::get('/blackjack/hit', [blackjackController::class, 'hit'])->name('blackjack.hit');
    Route::get('/blackjack/stand', [blackjackController::class, 'stand'])->name('blackjack.stand');

    Route::get('/blackjack/reset', [blackjackController::class, 'reset'])->name('blackjack.reset');
});


Route::get('/dashboard', DashboardController::class)
    ->name('dashboard.login');

Route::post('/dashboard', DashboardController::class)
    ->name('dashboardLogin.submit');

Route::get('/dashboard/home', [DashboardController::class, 'home'])
    ->name('dashboard.home');
