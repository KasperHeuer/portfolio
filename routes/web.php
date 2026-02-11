<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AboutController,
    blackjackController,
    CalculatorController,
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

// index
Route::get('/', [IndexController::class, 'view'])->name('index');

// about me
Route::get('/about', [AboutController::class, 'view'])->name('about');

// projects
Route::get('/projects', [ProjectController::class, 'view'])->name('projects');

// contact
Route::get('/contact', [ContactController::class, 'view'])->name('contact');
Route::post('/contact', [ContactController::class, 'create'])->name('contact.submit');

// math pages
Route::prefix('math')->group(function () {
    // math home
    Route::get('/home', [MathHomeController::class, 'view'])->name('math');

    // collatz sequence
    Route::get('/collatz-sequence', [CollatzController::class, 'view'])->name('collatz.view');
    Route::post('/collatz-sequence', [CollatzController::class, 'create'])->name('collatz.create');

    // factorial
    Route::get('/factorial', [FactorialController::class, 'view'])->name('factorial.view');
    Route::post('/factorial', [FactorialController::class, 'create'])->name('factorial.create');

    // prefect numbers
    Route::get('/perfect-numbers', [PerfectNumberController::class, 'view'])->name('perfect.view');
    Route::post('/perfect-numbers', [PerfectNumberController::class, 'create'])->name('perfect.create');

    // wisdom of the crowd
    Route::get('/wisdom-of-the-crowd', [WisdomController::class, 'view'])->name('wisdom.view');
    Route::post('/wisdom-of-the-crowd', [WisdomController::class, 'create'])->name('wisdom.create');

    // fibonacci
    Route::get('/fibonacci-sequence', [FibonacciController::class, 'view'])->name('fibbonaci.view');
    Route::post('/fibonacci-sequence', [FibonacciController::class, 'create'])->name('fibbonaci.create');

    //exponents
    Route::get('/exponents', [ExponentsController::class, 'view'])->name('exponents.view');
    Route::post('/exponents', [ExponentsController::class, 'create'])->name('exponents.create');

    Route::prefix('calculator')->group(function () {
        Route::get("/", [CalculatorController::class, "view"])->name("calculator.view");
        Route::post("/", [CalculatorController::class, "create"])->name("calculator.create");
    });
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
