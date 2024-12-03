<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DebugController;
use App\Http\Controllers\Frontend\GuestController;

Route::get('/', [GuestController::class, 'home'])->name('home');
//Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('debug')->group(function () {
            Route::get('sptapi', [DebugController::class, 'sptapi'])->name('admin.debug.sptapi');
        });
    });
//});
