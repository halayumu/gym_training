<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingDetailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/TrainingDetail', [TrainingDetailController::class, 'index']);
