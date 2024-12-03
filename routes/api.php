<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Spt\SptController;
use App\Http\Controllers\Api\Spt\FikaController;

Route::prefix('spt')->group(function () {
    Route::prefix('fika')->group(function () {
        Route::get('/raids', [FikaController::class, 'raids'])->name('api.spt.fika.raids');
    });
    Route::post('dynamic', [SptController::class, 'dynamic'])->name('api.spt.dynamic');
});
