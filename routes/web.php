<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\GuestController;

Route::get('/', [GuestController::class, 'home'])->name('home');
