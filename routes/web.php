<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/auth/callback', AuthController::class)->name('auth.callback');
