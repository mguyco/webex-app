<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

route::get('/', [WelcomeController::class, 'index'])->name('login');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Route::get('/activity', [ActivityController::class, 'index'])->name('activity');
});

require __DIR__.'/auth.php';
