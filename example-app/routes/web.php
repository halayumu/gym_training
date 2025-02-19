<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingDetailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/TrainingInput', [TrainingDetailController::class, 'index']); //入力画面
Route::post('/TrainingDetail', [TrainingDetailController::class, 'index']); //詳細画面
Route::post('/TrainingMenuAdd', [TrainingDetailController::class, 'create']);//トレーニングメニュー登録