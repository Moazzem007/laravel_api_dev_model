<?php

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/backend-dashboard', [BackendController::class, 'index']);
